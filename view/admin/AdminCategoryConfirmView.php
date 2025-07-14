<?php
class AdminCategoryConfirmView extends View{
	public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to add?</h3>
			<form method="post">
				<div class="form-group">
    				<label for="catName">Category Name:</label>
    				<input type="text" name="catName" class="form-control" value="<?php echo htmlspecialchars(@$_POST['catName']) ?>" disabled="disabled">
    			</div>
    			<input type="submit" name="btnCatConfirm" value="Confirm" class="btn btn-success">
    			<input type="submit" name="btnCatConfirmCancel" value="Cancel" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
	}
}