<?php

class PackageStartView extends View
{

    public function displayBody()
    {
        ?>
<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Package starting</p>
	</div>
</div>
<!-- content  -->
<div class="row">
	<div class="col page_center">
		<p>
			<i class='fas fa-check-circle' style="font-size: 48px; color: green;"></i>
		</p>
		<p>Your package is successfully started.</p>

		<a href="index.php?usecase=<?php echo UC_DAILY_FOOD_PLAN?>"
			class="btn btn-outline-success">OK</a>
	</div>
</div>
<?php
    
}
}