<?php

class AdminUserRecordDailyFoodView extends View
{

    private $number_of_day;

    private $start_from;

    private $limit_no_of_record = 7;

    private $dailyFood;

    private $flag;

    private $currentDay;

    public function __construct($numberOfDay, $dailyFood)
    {
        $this->number_of_day = $numberOfDay;
        // $this->start_from = $start_from;
        $this->dailyFood = $dailyFood;
        // $this->flag = $flag;
        // $this->currentDay = $currentDay;
    }

    public function displayBody()
    {
        ?>
        <style>
        .box{
	border: 1px solid #5b8205;
	border-radius: 15px;
	margin: 20px 0;
	padding: 15px 30px;
}
        
        </style>

<div class="container">
<?php include 'view/inc/user_menu_admin.php'; ?>


	<p class="pagehead" style="margin: 20px 0 50px;">
	<?php echo $_SESSION["adminViewUserName"];?>
		's Package history
	</p>


	<!-- Request food list button -->
	<div class="row">
		<div class="col-sm-2 record_btn_title">Day</div>
		<div class="col-sm-2 record_btn_title">Breakfast</div>
		<div class="col-sm-2 record_btn_title">Lunch</div>
		<div class="col-sm-2 record_btn_title">Snack</div>
		<div class="col-sm-2 record_btn_title">Dinner</div>
		
	</div>

<?php
        
        if (! empty($this->dailyFood)) {
            $day = 0;
            $count = 0;
            ?>
<div class="row">
           <?php
            
            foreach ($this->dailyFood as $key => $value) {
                $meal_time = $value["meal_time"];
                $food_name = $value["food_name"];
                $food_description = $value["food_desc"];
                $meal_description = $value["meal_desc"];
                $meal_type = $value["meal_type"];
                $meal_image = $value["meal_image"];
                $status = $value["status"];
                $daily_id = $value["daily_id"];
                
                // echo $count;
             if ($count % 4 == 0) {
                    ?> </div>
	<div class="row">
		<div class="col-sm-2 <?php echo($status==1)?'record_btn_green':'record_btn_red';?>">
		<?php echo $value["days"];?></div>
             
<?php
                }
                ?>
<div class="col-sm-2 <?php echo($status==1)?'record_btn_green':'record_btn_red';?>">
<?php echo $value["food_name"];?></div>


        <?php $count ++; 
            } // end foreach ?>
         
         
          </div>
          
          <form method="post">
		<input type="submit" name="btnUserRecordBack" value="Back"
				class="btn btn-outline-success">
	</form>

<?php
        } else {
            ?>
<div class="row">
		<div class="col page_content_center">
			<p>
				<i class='fas fa-info-circle' style="font-size: 48px; color: green;"></i>
				<p>No package history for this user.</p>
		<form method="post">
		<input type="submit" name="btnUserRecordBack" value="Back"
				class="btn btn-outline-success">
	</form>
			</p>

		</div>
	</div>
</div>
<?php
        }
        ?>
<?php
    }
}