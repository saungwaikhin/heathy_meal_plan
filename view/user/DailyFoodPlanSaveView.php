<?php

class DailyFoodPlanSaveView extends View
{

    public function displayBody()
    {
        ?>
        <script>
		if(window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Daily Food Plan</p>
	</div>
</div>
<!-- content  -->
<div class="row">
	<div class="col page_center">
		<p>
			<i class='fas fa-check-circle' style="font-size: 48px; color: green;"></i>
		</p>
		<p>Your daily food plans are successfully requested.</p>
		<form method="post">
			<input type="submit" class="btn btn-outline-success" value="Back"
				name="btnbackDailyFood">
		</form>
	</div>
</div>




<?php
    }
}