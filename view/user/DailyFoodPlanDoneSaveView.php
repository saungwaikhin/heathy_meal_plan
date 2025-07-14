<?php

class DailyFoodPlanDoneSaveView extends View
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
		<p>Have you eaten?</p>
		<form method="post">
			<input type="submit" class="btn btn-outline-success" value="Yes"
				name="btnDailyFoodDoneSave"> <input type="submit"
				name="btnbackDailyFood" value="No"
				class="btn btn-outline-danger">
		</form>
	</div>
</div>

<?php
    
}
}