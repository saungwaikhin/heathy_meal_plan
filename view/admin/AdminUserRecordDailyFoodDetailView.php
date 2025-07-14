<?php
class AdminUserRecordDailyFoodDetailView extends View{
    private $UserDailyFoodDetail;
    public function __construct($UserDailyFoodDetail){
        $this->UserDailyFoodDetail = $UserDailyFoodDetail;
    }
    public function displayBody()
    {?>
     <style>
     .food {
	border: 1px solid #5b8205;
	border-radius: 15px;
	margin: 20px 0;
	padding: 15px 30px;
}
     
     </style>   
<h3> Day<?php  echo $_SESSION["day"]?> Detail</h3>
<?php 
foreach(  $this->UserDailyFoodDetail  as $key => $value){?>
              
<div class="food">
<div class="row">
<div class="col-sm-6">
<div class="row"><p class="contenthead">
<?php
                
                    if ($value["meal_time"] == 1)
                    echo "Breakfast";
                    elseif ($value["meal_time"]== 2)
                    echo "Lunch";
                    elseif ($value["meal_time"] == 3)
                    echo "Snack";
                    if ($value["meal_time"]== 4)
                    echo "Dinner";
                ?>

</p></div>
			<div class="row">
				<div class="col-sm-3">Food Name:</div>
				<div class="col-sm-5"><?php echo$value["food_name"]?></div>
			</div>
			<div class="row">
				<div class="col-sm-3">Food Description:</div>
				<div class="col-sm-5"><?php echo$value["food_desc"]?></div>
			</div>
			<div class="row">
			<div class="col-sm-3">Status</div>
			<div class="col-sm-5">
				<?php 
				if($value["status"]==1) echo"Done";
				else echo"Undone";
				?>
			</div>
			</div>
		</div>	
		
<div class="col-sm-6">
			<img src="images/<?php echo $value["meal_image"] ?>" height="200">
</div>
</div>	
</div>
<?php
}//foreach
?>
<form method="post">
<input type="submit" name="btnUserDailyFoodBack" value="Back" class="btn btn-success"></form>
<?php

	} 
}
