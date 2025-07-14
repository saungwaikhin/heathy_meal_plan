<?php
class AdminFoodListConfirmView extends View{
	public function displayBody(){
?>
	<div class="col-6 col-12">
		<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to add?</h3>
		<form method="post">
			<div class="form-group">
				<label for="foodName">Food Name:</label>
				<input type="text" name="foodName" value="<?php echo htmlspecialchars(@$_POST['foodName']) ?>" class="form-control" disabled="disabled">
			</div>
			<div class="form-group">
				<label for="catId">Category:</label>
				<input type="text" name="catId" value="<?php echo htmlspecialchars(@$_POST['catId']) ?>" class="form-control" disabled="disabled">
			</div>
			<div class="form-group">
				<label for="foodDescription">Food Description</label>
				<textarea name="foodDescription" rows="5" cols="20" class="form-control" disabled="disabled"><?php echo htmlspecialchars(@$_POST["foodDescription"]) ?></textarea>
			</div>
			<input type="submit" name="btnFoodConfirm" value="Confirm" class="btn btn-success">
			<input type="submit" name="btnFoodConfirmCancel" value="Cancel" class="btn btn-success">
		</form>
	</div>
<?php
	}
}
