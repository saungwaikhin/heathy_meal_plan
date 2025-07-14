<?php

class AdminMealSaveView extends View
{

    public function displayBody()
    {
        ?>
<script>
		if(window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
<div class="row">
	<div class="col ">
		<p class="pagehead">Daily Food Plan</p>
	</div>
</div>
<div class="row">
	<div class="col page_center">
		<p>
			<i class="fas fa-check-circle" style="font-size: 48px; color: green;"></i>
		</p>
		<p>New Meal is successfully added.</p>
		<form method="post">
			<input type="submit" name="btnBackMeal" value="Back"
				class="btn btn-success">
		</form>
	</div>
</div>

<?php
    }
}