<?php
class AdminMealEditView extends View{
    private $errors;
    private $mealById;
    public function __construct($meal,$errors=null){
        $this->errors = $errors;
        $this->mealById = $meal;
    }
    
    public function displayBody(){
        
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Edit Meal Plan</h3>
			<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="mealId" value="<?php echo $this->mealById[0]["meal_id"] ?>">
				<div class="form-group">
    				<label for="updTypeOfMeal">Types of Meal Plan:</label>
    				<select name="updTypeOfMeal" class="form-control">
    				<option value="">--Select Meal Type--</option>
    				<option value="loss" <?php if($this->mealById[0]["meal_type"]=="loss") echo "selected";?>>Loss</option>
    				<option value="normal" <?php if($this->mealById[0]["meal_type"]=="normal") echo "selected";?>>Normal</option>
    				<option value="gain" <?php if($this->mealById[0]["meal_type"]=="gain") echo "selected";?>>Gain</option>
    			</select> 
    				<font color="red">
    					<?php 
    					   if(isset($this->errors["meal_null"]))
    					       echo $this->errors["meal_null"];
    					?>
    				</font>
    			</div>
    			<div class="form-group">
    				<label for="updFoodId">Food Name:</label>
    				<select name="updFoodId" class="form-control">
    					<option value="0">--Choose Food--</option>
    					<?php
                        $foodDao = new FoodListDao();
                        $allfood = $foodDao->getAllFoodList();
                        foreach ($allfood as $key => $food) {
                        ?>
    					<option
						value="<?php echo $food["food_id"];?>"
						>
						<?php echo $food["food_name"];?>
					</option>
					<?php
                        
                        }
                        ?>
    			</select> 
    			</div>
    			<div class="form-group">
    				<label for="updEatTime">Eating Time:</label>
    				<select name="updEatTime" class="form-control">
        				<option value="">--Choose Eating Time--</option>
        				<option value="1" <?php if($this->mealById[0]["meal_time"]=="1") echo "selected";?>>Breakfast</option>
        				<option value="2" <?php if($this->mealById[0]["meal_time"]=="2") echo "selected";?>>Lunch</option>
        				<option value="3" <?php if($this->mealById[0]["meal_time"]=="3") echo "selected";?>>Snack</option>
        				<option value="4" <?php if($this->mealById[0]["meal_time"]=="4") echo "selected";?>>Dinner</option>
        			</select>
    				<font color="red">
    					<?php 
    					   if(isset($this->errors["eat_null"]))
    					       echo $this->errors["eat_null"];
    					?>
    				</font>
    			</div>
    			<div class="form-group">
    				<label for="updMealDesc">Description</label>
    				<textarea name="updMealDesc" rows="5" cols="20" class="form-control"><?php echo $this->mealById[0]["meal_desc"] ?></textarea>
    				<font color="red">
    					<?php 
    					   if(isset($this->errors["desc_null"]))
    					       echo $this->errors["desc_null"];
    					?>
    				</font>
    			</div>
                <div class="form-group">
                	<img src="./images/meal/<?php echo $this->mealById[0]["meal_image"]?>" width="100px"><br>
                    <label for="image">Choose Image:</label>
                    <input type="file" name="<?php echo ELEMENT;?>" >
                </div>
    			<input type="submit" name="btnMealUpdate" value="Update" class="btn btn-success">
    			<input type="submit" name="btnMealUpdateCancel" value="Cancel" class="btn btn-success">
    			<font color="red">
    				<?php 
    					if(isset($this->errors["all_null"]))
    					   echo $this->errors["all_null"];
    				?>
    			</font>
			</form>
		</div>
	</div>
<?php 
    }
}