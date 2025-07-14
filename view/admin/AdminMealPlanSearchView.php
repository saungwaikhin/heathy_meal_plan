<?php
class AdminMealPlanSearchView extends View{
	private $searchMeal;
	public function __construct($searchMeal){
		$this->searchMeal = $searchMeal;	
	}
	
	public function displayBody(){
		if(!empty($this->searchMeal)){
			//echo "successful";
?>
<div class="col-6 col-12">
    	<form method="post">
    		<div class="row">
    			<div class="col-12">
    				<div class="box">
    					<div class="box-header">
    						<h3 class="box-title" style="font-family: Tahoma; color: #65ab3b;">Meal Plan Table</h3>
    					</div>
    					<div class="box-body">
    						<table class="table table-bordered table-hover"
    							style="text-align: center;">
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
    							
    							
    							$i=1;
									foreach ($this->searchMeal as $key=>$meal){
										
								?>
									<tr>
										<td><?php echo $i; $i++;?></td>
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
    		<input type="submit" name="btnBackMeal" value="Back" class="btn btn-success">
    	</form>
    </div>		
<?php 			
		}else{
?>
		<h3>There is No Search Result!</h3>
		<form method="post">
			<input type="submit" name="btnBackMeal" value="Back">
		</form>
<?php 
		}
	}
}