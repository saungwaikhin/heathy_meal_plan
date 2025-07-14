<?php

class RecordUpdateConfirmView extends View
{

    public function displayBody()
    {
        ?>

<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Update your current information</p>
	</div>
</div>
<div class="container">
	<div class="row">

		<div class="col page_center">
			<p>
				<i class='fas fa-check-circle' style="font-size: 48px; color: green;"></i>
			</p>
			<p style="color: #65ab3b;">Are you sure to update information.</p>
			<form method="post">
				<div class="form-group">

					Height:<input type="text" name="feet" maxlength="1" size="7"
						value="<?php echo @$_POST["feet"]; ?>" disabled="disabled">feets <input
						type="text" name="inches" maxlength="2" size="7"
						value="<?php echo @$_POST["inches"];?>" disabled="disabled">
					inches
				</div>
				<div class="form-group">
					Weight:<input type="text" name="weight" disabled="disabled"
						value="<?php echo @$_POST["weight"];?>"> lbs
				</div>
				<div class="form-group">
					<input type="submit" value="Confirm" name="btnUpdateRecordConfirm"
						class="btn btn-outline-success"> <input type="submit"
						value="Cacel" name="btnUpdateRecordCacel"
						class="btn btn-outline-success">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
    
}
}

