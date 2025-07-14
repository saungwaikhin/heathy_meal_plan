<?php
class AdminPackageEditSaveView extends View{
    public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Your data is successfully updated</h3>
			<form method="post">
				<input type="submit" name="btnPackageAddCancel" value="Back" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
    }
}