<?php
class RecordUpdateSaveView extends View
{
	public function displayBody()
	{
		?>
		<script>
		if(window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
<div class="content">

<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Update your current information</p>
	</div>
</div>
<!-- content  -->
<div class="row">
	<div class="col page_center">
		<p>
			<i class='fas fa-check-circle' style="font-size: 48px; color: green;"></i>
		</p>
		<p>User BMI Update successful.</p>
		<form class="suc" method="post">
			
			<input type="submit" value="Back" name="btnUpdateRecordBack" class="btn btn-outline-success">
		</form>
	</div>
</div>

</div>
		<?php
	}
}