<?php

class PackageConfirmView extends View
{

    public function displayBody()
    {
        ?>
        <div class="row">
	<div class="col ">
		<p class="pagehead">Daily Food Plan Package subscription </p>
	</div>
</div>
<div class="row">
	<div class="col page_center"><p><i class='fas fa-check-circle' style="font-size:48px;color:green;"></i></p>
		<p>Are you sure you want to use package?</p>
		<form method="post">
			<input type="submit" name="btnSavePackageConfirm" value="Confirm"
				class="btn btn-outline-success"> <input type="submit"
				name="btnSavePackageCancel" value="Cancel"
				class="btn btn-outline-danger">
		</form>
	</div>
</div>
<?php
    
}
}
