<?php

class AdminMealConfirmView extends View
{

    public function displayBody()
    {
        ?>
<div class="row">
	<div class="col-6 col-12">
		<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to add?</h3>
		<form method="post">
			<div class="form-group">
				<label for="typeOfMeal">Types of Meal Plan:</label> 
				<input type="text" name="typeOfMeal" class="form-control"
					value="<?php echo htmlspecialchars(@$_POST['typeOfMeal']) ?>"
					disabled="disabled">
			</div>
			<div class="form-group">
				<label for="foodId">Food Name:</label>
    			<?php
                $id = $_POST["foodId"];
                $foodDao = new FoodListDao();
                $food = $foodDao->getFoodByFoodId($id);
                foreach ($food as $key => $value) {
                ?>
    				<input type="text" name="foodId" class="form-control"
					value="<?php echo $value['food_name']?>" disabled="disabled">
    			<?php
                }
                ?>
    			</div>
			<div class="form-group">
				<label for="eatTime">Eating Time:</label> 
				<input type="text" name="eatTime" class="form-control"
					value="<?php
                        if ($_POST['eatTime'] == 1)
                            echo "breakfast";
                        elseif ($_POST['eatTime'] == 2)
                            echo "lunch";
                        elseif ($_POST['eatTime'] == 3)
                            echo "snack";
                        else
                            echo "dinner";
                        ?>"
					disabled="disabled">
			</div>
			<div class="form-group">
				<label for="mealDesc">Description</label>
				<textarea name="mealDesc" rows="5" cols="20" class="form-control"
					disabled="disabled"><?php echo htmlspecialchars(@$_POST['mealDesc']) ?></textarea>
			</div>
			<!-- <div class="form-group">
				<label for="image">Choose Image:</label> <input type="file"
					name="<?php echo ELEMENT; ?>" disabled="disabled">
			</div> -->
			 <div class="form-group">
				<label for="image">Choose Image:</label> 
				<img src="images/meal/<?php echo $_SESSION["mealphoto"] ?>" width="200px">
			</div>
			<input type="submit" name="btnMealConfirm" value="Confirm"
				class="btn btn-success"> <input type="submit"
				name="btnMealConfirmCancel" value="Cancel" class="btn btn-success">
		</form>
	</div>
</div>
<?php
    }
}