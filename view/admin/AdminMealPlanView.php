<?php
class AdminMealPlanView extends View{
	private $allmeal;
	private $no_of_all_records;
    private $start_from;
    
    public function __construct($allmeal, $no_of_all_records, $start_from){
    	$this->allmeal = $allmeal;
    	$this->no_of_all_records = $no_of_all_records;
    	$this->start_from = $start_from;
    }
	
	public function displayBody(){
?>
	<style type="text/css">
		.typeahead, .tt-query {
			border: 2px solid #CCCCCC;
			border-radius: 8px;
			font-size: 15px;
			height: 40px;
			line-height: 40px;
			outline: medium none;
			padding: 0px;
			width: 175px;
		}
		
		.submitahead {
			border: 2px solid #CCCCCC;
			border-radius: 8px;
			font-size: 16px;
			height: 40px;
			line-height: 40px;
			outline: medium none;
			padding: 0px;
			width: 90px;
		}
		
		.typeahead {
			background-color: #FFFFFF;
		}
		
		.typeahead:focus {
			border: 2px solid #0097CF;
		}
		
		.tt-query {
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
		}
		
		.tt-dropdown-menu {
			background-color: #FFFFFF;
			border: 1px solid rgba(0, 0, 0, 0.2);
			border-radius: 8px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
			margin-top: 0px;
			padding: 0px;
			width: 200px;
		}
		</style>
	
	<div class="col-12">
		<form method="post" enctype="multipart/form-data">
			<div class=row>
			<div class="col-4">
				<input type="submit" name="btnMealPlanAdd" value="Add Meal" class="btn btn-success">
			</div>
			<div class="col-8">
				<div class="row">
					<div class="col-3">
						 <select name="searchMealType" class="form-control typeahead tt-query" id="searchMealType" >
    					<option value="0">--Choose Meal Types--</option>
    					<option value="normal">normal</option>
    					<option value="loss">loss</option>
    					<option value="gain">gain</option>
    				</select>
					</div>
					<div class="col-3">
						 <select name="searchMealTime" class="form-control typeahead tt-query" id="searchMealTime">
    					<option value="0">--Choose Meal Time--</option>
    					<option value="1">breakfast</option>
    					<option value="2">lunch</option>
    					<option value="3">snack</option>
    					<option value="4">dinner</option>
    				</select>
					</div>
					<div class="col-3">
						<input type="text" name="foodName" id="foodName" class="form-control typeahead tt-query" align="right" >
					</div>
					<div class="col-2">
						<input type="submit" name="btnMealSearch" value="Search" class="btn btn-outline-success submitahead">
					</div>
				</div>
			</div>
		</div>
				
			
			<br>
			
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title" style="font-family: Tahoma; color: #65ab3b;">Meal Plan Table</h3>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-hover" style="text-align: center;">
								<tr style="color: #a7d433; font-size: 20px;">
									<th>No</th>
									<th>Types</th>
									<th>Food Name</th>
									<th>Eating Time</th>
									<th>Description</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								<?php 
									foreach ($this->allmeal as $key=>$meal){
								?>
									<tr>
										<td><?php echo ++$this->start_from; ?></td>
										<td><?php echo $meal["meal_type"]?></td>
										<?php 
											$foodDao = new FoodListDao();
											$foodId = $meal["food_id"];
											$food = $foodDao->getFoodByFoodId($foodId);
											foreach ($food as $key=>$value){
										?>
										<td><?php echo $value["food_name"]?></td>
										<?php 	
											}
										?>
										<td><?php 
											$mealTime = $meal["meal_time"];
											if($mealTime==1)
												echo "Breakfast";
											elseif($mealTime==2)
												echo "Lunch";
											elseif($mealTime==3)
												echo "Snack";
											else 
												echo "Dinner";
										?></td>
										<td><?php echo $meal["meal_desc"]?></td>
										<td><img src="./images/meal/<?php echo $meal["meal_image"]?>" width=100px></td>
										<td colspan="2" align="right">
											<a href="index.php?usecase=<?php echo UC_MEAL_EDT ?>&id=<?php echo $meal["meal_id"] ?>" class="btn btn-success">Edit</a>
											<a href="index.php?usecase=<?php echo UC_MEAL_DEL ?>&id=<?php echo $meal["meal_id"] ?>" class="btn btn-success">Delete</a>
										</td>
									</tr>
								<?php 	
									}
								?>
								
							</table>
						</div>
					</div>
				</div>
			</div>	
		</form>
		<div class="prenextbtn">
		<a href="index.php?usecase=<?php echo UC_A_MEAL?>&page=<?php echo $_SESSION["page"]-1 ?>">
			Previous </a>&nbsp;|&nbsp; 
		<a href="index.php?usecase=<?php echo UC_A_MEAL?>&page=<?php echo $_SESSION["page"]+1 ?>">
			Next </a>
	</div>
	</div>
<?php 
	}
}