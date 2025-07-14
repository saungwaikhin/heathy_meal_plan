<?php
class AdminPackageConfirmView extends View{
    public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to add?</h3>
			<form method="post">
				<div class="form-group">
    				<label for="pName">Package Name:</label>
    				<input type="text" name="pName" class="form-control" value="<?php echo htmlspecialchars(@$_POST['pName']) ?>" disabled="disabled">
    			</div>
    			<div class="form-group">
    				<label for="pDay">Days:</label>
    				<input type="text" name="pDay" class="form-control" value="<?php echo htmlspecialchars(@$_POST['pDay']) ?>" disabled="disabled">
    			</div>
    			<div class="form-group">
    				<label for="pdescription">Package Description</label>
    				<textarea name="pDescription" rows="5" cols="20" class="form-control" disabled="disabled"><?php echo htmlspecialchars(@$_POST["pDescription"]) ?></textarea>
    			</div>
    			<input type="submit" name="btnPackageConfirm" value="Confirm" class="btn btn-success">
    			<input type="submit" name="btnPackageConfirmCancel" value="Cancel" class="btn btn-success">
			</form>
		</div>
	</div>
<?php  
    }
}