<?php

class AdminMealAddView extends View
{

    private $errors;

    public function __construct($errors = null)
    {
        $this->errors = $errors;
    }

    public function displayBody()
    {
        ?>
<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Add Meal Plan</p>
	</div>
</div>
<div class="col-6 col-12">

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="typeOfMeal">Types of Meal Plan:</label>
			<select name="typeOfMeal" class="form-control">
				<option value="">--Select Meal Type--</option>
				<option value="loss">Loss</option>
				<option value="normal">Normal</option>
				<option value="gain">Gain</option>

			</select> 
			<font color="red">
					<?php
        if (isset($this->errors["meal_null"]))
            echo $this->errors["meal_null"];
        ?>
				</font>
		</div>
		<div class="form-group">
			<label for="foodId">Food Name:</label> 
			<select name="foodId" class="form-control">
				<option value="">--Choose Food--</option>
					<?php
                    $foodDao = new FoodListDao();
                    $allfood = $foodDao->getAllFoodList();
                    foreach ($allfood as $key => $food) {
                    ?>
					<option value="<?php echo $food["food_id"] ?>"><?php echo $food["food_name"]?></option>
    				<?php
                    }
                    ?>
			</select> 
			<font color="red">
			<?php
            if (isset($this->errors["food_null"]))
                echo $this->errors["food_null"];
            ?>
			</font>
		</div>
		<div class="form-group">
			<label for="eatTime">Eating Time:</label> 
			<select name="eatTime" class="form-control">
				<option value="">--Choose Eating Time--</option>
				<option value="1">Breakfast</option>
				<option value="2">Lunch</option>
				<option value="3">Snack</option>
				<option value="4">Dinner</option>
			</select> 
			<font color="red">
			<?php
            if (isset($this->errors["eat_null"]))
                echo $this->errors["eat_null"];
            ?>
				</font>
		</div>
		<div class="form-group">
			<label for="mealDesc">Description</label>
			<textarea name="mealDesc" placeholder="Enter Description..." rows="5"
				cols="20" class="form-control"><?php echo htmlspecialchars(@$_POST['mealDesc']) ?></textarea>
			<font color="red">
					<?php
        if (isset($this->errors["desc_null"]))
            echo $this->errors["desc_null"];
        ?>
				</font>
		</div>
		<div class="form-group">
			<label for="image">Choose Image:</label> 
			<input type="file" name="<?php echo ELEMENT;?>">
		</div>
		<input type="submit" name="btnMealAdd" value="Add"
			class="btn btn-success"> <input type="submit" name="btnMealAddCancel"
			value="Cancel" class="btn btn-success"> <font color="red">
					<?php
        if (isset($this->errors["all_null"]))
            echo $this->errors["all_null"];
        ?>
			</font>
	</form>
</div>
<?php
    }
}