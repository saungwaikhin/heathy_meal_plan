<?php
class AdminCategoryEditView extends View{
	public function displayBody(){
		$id = $_GET["id"];
		//echo $id;
		$categorydao = new CategoryDao();
		$category = $categorydao->getCatById($id);
?>
	<div class="row">
		<div class="col-6 col12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Edit Category</h3>
			<form method="post">
				<input type="hidden" name="catId" value="<?php echo $id;?>">
				<div class="form-group">
    				<label for="updCatName">Category Name:</label>
    				<input type="text" name="updCatName" class="form-control" value="<?php echo $category[0]['cat_name'] ?>" >
    			</div>
    			<input type="submit" name="btnCatUpd" value="Confirm" class="btn btn-success">
    			<input type="submit" name="btnCatUpdCancel" value="Cancel" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
	}
}