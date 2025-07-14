<?php
class AdminPackageEditConfirmView extends View{
    public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to update?</h3>
			<form method="post">
				<div class="form-group">
    				<label for="updPName">Package Name:</label>
    				<input type="text" name="updPName" class="form-control" value="<?php echo htmlspecialchars(@$_POST['updPName']) ?>" disabled="disabled">
    			</div>
    			<div class="form-group">
    				<label for="updPDay">Days:</label>
    				<input type="text" name="updPDay" class="form-control" value="<?php echo htmlspecialchars(@$_POST['updPDay']) ?>" disabled="disabled">
    			</div>
    			<div class="form-group">
    				<label for="updPDescription">Package Description</label>
    				<textarea name="updPDescription" rows="5" cols="20" class="form-control" disabled="disabled"><?php echo htmlspecialchars(@$_POST['updPDescription']) ?></textarea>
    			</div>
    			<input type="submit" name="btnPackageUpdConfirm" value="Confirm" class="btn btn-success">
    			<input type="submit" name="btnPackageUpdConfirmCancel" value="Cancel" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
    }
}