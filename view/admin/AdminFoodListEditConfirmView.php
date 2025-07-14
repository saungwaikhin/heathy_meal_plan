<?php
class AdminFoodListEditConfirmView extends View{
	public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to update</h3>
			<form method="post">
			<div class="form-group">
				<label for="updFoodName">Food Name:</label>
				<input type="text" name="updFoodName" value="<?php echo htmlspecialchars(@$_POST['updFoodName']) ?>" class="form-control" disabled="disabled">
			</div>
			<div class="form-group">
				<label for="updCategory">Category:</label>
				<input type="text" name="updCategory" value="<?php echo htmlspecialchars(@$_POST['updCategory']) ?>" class="form-control" disabled="disabled">
			</div>
			<div class="form-group">
				<label for="updFoodDescription">Food Description</label>
				<textarea name="updFoodDescription" rows="5" cols="20" class="form-control" disabled="disabled"><?php echo htmlspecialchars(@$_POST["updFoodDescription"]) ?></textarea>
			</div>
			<input type="submit" name="btnFoodUpdConfirm" value="Confirm" class="btn btn-success">
			<input type="submit" name="btnFoodUpdConfirmCancel" value="Cancel" class="btn btn-success">
		</form>
		</div>
	</div>
<?php
	}
}
?>