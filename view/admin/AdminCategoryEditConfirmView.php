<?php
class AdminCategoryEditConfirmView extends View{
	public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to update?</h3>
			<form method="post">
				<div class="form-group">
    				<label for="updCatName">Category Name:</label>
    				<input type="text" name="updCatName" class="form-control" value="<?php echo htmlspecialchars(@$_POST['updCatName']) ?>" disabled="disabled">
    			</div>
    			<input type="submit" name="btnCatUpdConfirm" value="Confirm" class="btn btn-success">
    			<input type="submit" name="btnCatUpdConfirmCancel" value="Cancel" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
	}
}