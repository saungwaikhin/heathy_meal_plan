<?php
class AdminPackageSaveView extends View{	
	public function __construct(){
		
	}
    public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Your data is successfully added</h3>
			<form method="post">
				<input type="submit" name="btnPackageAddCancel" value="Back">
			</form>
		</div>
	</div>
<?php 
    }
}