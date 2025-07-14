<?php

/*
 * date_default_timezone_set("Asia/Yangon");
 * echo "The time is " . date("h:i:sa");
 */
class DailyFoodPlanView extends View
{

    private $number_of_day;

    private $start_from;

    private $limit_no_of_record = 7;

    private $dailyFood;

    private $flag;

    private $currentDay;

    public function __construct($numberOfDay, $start_from, $dailyFood, $flag, $currentDay)
    {
        $this->number_of_day = $numberOfDay;
        $this->start_from = $start_from;
        $this->dailyFood = $dailyFood;
        $this->flag = $flag;
        $this->currentDay = $currentDay;
    }

    public function displayBody()
    {
        ?>
<style>
.w3-bar, .active {
	background-color: #f8f9fa;
	color: #000;
	border-top: 2px solid #33cc33;
}

.current {
	background-color: #e6e6e6;
	color: #000;
}

.food {
	border: 1px solid #5b8205;
	border-radius: 15px;
	margin: 20px 0;
	padding: 15px 30px;
}

.button {
	width: 100%;
}

.block {
	display: block;
	width: 100%;
	border: none;
	background-color: #4CAF50;
	color: white;
	padding: 14px 28px;
	font-size: 16px;
	cursor: pointer;
	text-align: center;
}

.block:hover {
	background-color: #ddd;
	color: black;
}
</style>
<div class="pageHigh">
	<div class="row">
		<div class="col ">
			<p class="pagehead">Daily Food Plan</p>
		</div>
	</div>


<?php if(isset($this->flag["no_package"])){?>
<div class="row">
		<div class="col page_center">
			<p>
				<i class="fa fa-info-circle" style="font-size: 48px; color: green;"></i>
			</p>

			<p>You didn't subscribe any package.</p>
			<p>Please choose one package to start your daily food plan.</p>
			<form method="post">
				<input type="submit" class="btn btn-outline-success"
					value="Choose Package" name="btnHome">
			</form>
		</div>
	</div>
<?php }else{?>
<div class="row ">
		<div class="col pageNo">
			Today is <span class="text-green">Day<?php echo $this->currentDay?></span>
			of <span class="text-green">Day<?php echo $this->number_of_day;?></span>
		</div>
	</div>
	<!-- Daily button -->
	<div class="w3-bar w3-green ">

		<a class="w3-bar-item w3-button" style="width: 11.1%"
			href="index.php?usecase=<?php echo UC_DAILY_FOOD_PLAN?>&page=<?php echo $_SESSION['page']-1?>">Previous</a>
		<?php for ($i=$this->start_from+1;$i<=$this->number_of_day;$i++){?>
		<?php if($this->currentDay==$i){?>
	<a class="w3-bar-item w3-button active" style="width: 11.1%"
			href="index.php?usecase=<?php echo UC_DAILY_FOOD_PLAN?>&page=<?php echo $_SESSION['page']?>&dailypage=<?php echo $i;?>">
		Day<?php echo $i;?> </a>
		<?php
                } else {
                    if (@$_GET["dailypage"] == $i || @$this->dailyFood[0]["days"] == $i) {
                        ?>
	<a class="w3-bar-item w3-button current" style="width: 11.1%"
			href="index.php?usecase=<?php echo UC_DAILY_FOOD_PLAN?>&page=<?php echo $_SESSION['page']?>&dailypage=<?php echo $i;?>">
		Day<?php echo $i;?> </a>
		<?php   }else{?>
	<a class="w3-bar-item w3-button" style="width: 11.1%"
			href="index.php?usecase=<?php echo UC_DAILY_FOOD_PLAN?>&page=<?php echo $_SESSION['page']?>&dailypage=<?php echo $i;?>">
		Day<?php echo $i;?> </a>
		<?php
                    }
                }
                @$count ++;
                if ($count == $this->limit_no_of_record)
                    break;
            }
            ?>
	<a class="w3-bar-item w3-button" style="width: 11.1%"
			href="index.php?usecase=<?php echo UC_DAILY_FOOD_PLAN?>&page=<?php echo $_SESSION['page']+1?>">Next</a>
	</div>

	<!-- Request food list button -->

<?php
            if (! isset($_GET["dailypage"]) && empty($this->dailyFood)) {
                
                ?>
<div class="row">
		<div class="col page_center">
			<form method="post">
				<div class="form-group">
					<input type="submit" value="Request Food List"
						name="btnRequestFoodList" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
<?php
            }
            if (@$_GET["dailypage"] == $this->currentDay && ! $this->flag["current_day"]) {
                
                ?>
<div class="row">
		<div class="col page_center">
			<form method="post">
				<div class="form-group">
					<input type="submit" value="Request Food List"
						name="btnRequestFoodList" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>

<?php
            }
            if (@$_GET["dailypage"] == $this->currentDay + 1 && ! $this->flag["next_day"]) {
                ?>
<div class="row">
		<div class="col page_center">
			<form method="post">
				<div class="form-group">
					<input type="submit" value="Request Next Day Food List"
						name="btnRequestNextDayFoodList" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>

<?php
            }
            if (! empty($this->dailyFood)) {
                foreach ($this->dailyFood as $key => $value) {
                    $meal_time = $value["meal_time"];
                    $food_name = $value["food_name"];
                    $food_description = $value["food_desc"];
                    $meal_description = $value["meal_desc"];
                    $meal_type = $value["meal_type"];
                    $meal_image = $value["meal_image"];
                    $status = $value["status"];
                    $daily_id = $value["daily_id"];
                    
                    ?>
<!-- Request food list button -->
	<div class="food">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<p class="contenthead"><?php
                    
                    if ($meal_time == 1)
                        echo "Breakfast";
                    elseif ($meal_time == 2)
                        echo "Lunch";
                    elseif ($meal_time == 3)
                        echo "Snack";
                    else
                        echo "Dinner";
                    ?></p>
				</div>
				<div class="row">
					<div class="col-sm-3">Food Name:</div>
					<div class="col-sm-5"><?php echo"$food_name" ?></div>
				</div>
				<div class="row">
					<div class="col-sm-3">Food Description:</div>
					<div class="col-sm-5"><?php echo"$food_description" ?></div>
				</div>
				<div class="row">
					<div class="col-sm-3">Meal Type:</div>
					<div class="col-sm-5"><?php echo"$meal_type" ?></div>
				</div>
				<div class="row">
					<div class="col-sm-3">Meal Description:</div>
					<div class="col-sm-6"><?php echo"$meal_description" ?></div>
				</div>
			</div>
			<div class="col-sm-6">
				<img src="images/meal/<?php echo $meal_image ?>" height="200">
			</div>

		</div>
		<br>
	<?php 
// if( $this->flag["current_day"]){
                    if (@$_GET["dailypage"] == $this->currentDay || @$_GET["dailypage"] == "") {
                        ?>
	<div class="row">
			<div class="col-sm-12">
				<form method="post">
					<input type="hidden" name="dailyId" value="<?php echo $daily_id;?>">
					<button type="submit" class="btn btn-success btn-block"
						name="btnDailyFoodDone" <?php echo($status==1)?'disabled':'';?>>
						<i class='fas fa-check-circle' style='font-size: 24px'></i>&emsp;Done
					</button>
				</form>
			</div>
		</div>
	<?php 
// }
                    } elseif (@$_GET["dailypage"] == $this->currentDay + 1) {
                        ?>
	<div class="row">
			<div class="col-sm-12">

				<input type="hidden" name="dailyId" value="<?php echo $daily_id;?>">
				<p class="btn btn-success btn-block">
					<i class='fas fa-drumstick-bite'></i>&emsp;Your tomorrow food.
				</p>

			</div>
		</div>
	<?php }else{?>
	<div class="row">
			<div class="col-sm-12">

				<input type="hidden" name="dailyId" value="<?php echo $daily_id;?>">
				<?php if($status==1){?>
				<p class="btn btn-success btn-block">
					<i class='fas fa-drumstick-bite'></i>&emsp;You have eaten this
					food.
				</p>
				<?php }else{?>
				<p class="btn btn-danger btn-block">
					<i class='fas fa-drumstick-bite'></i>&emsp;You haven't eaten this
					food.
				</p>
				<?php }?>
			
		</div>
		</div>
	<?php }?>
</div>



<?php
                } // end foreach
            } else {
                ?>
            <div class="row">
		<div class="col page_content_center">
			<p>
				<i class='fas fa-info-circle'
					style="font-size: 48px; color: green;"></i>
			</p>
			<p>
               <?php  echo "Current day is Day".$this->currentDay;?></p>
		</div>
	</div>
          <?php
            
}
        }
        ?>
<pre>
	<?php //print_r($this->dailyFood);?>
	<?php //print_r($this->flag);?>
	<?php //print_r($this->currentDay);?>
	</pre>
	<div class="row">
		<div class="col">
			<p class="note">
				*Note<br> -Daily food plan lists are automatically generated by the
				system based on your current BMI result value.
			</p>
		</div>
	</div>
</div>
<?php
    }
}
