<?php
class AdminMealEditConfirmView extends View{
    private $errors;
    public function __construct($errors=null){
        $this->errors = $errors;   
    }
    
    public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Are you sure to update?</h3>
			<form method="post">
				<div class="form-group">
    				<label for="updTypeOfMeal">Types of Meal Plan:</label>
    				<input type="text" name="updTypeOfMeal" class="form-control" 
    				value="<?php 
    				if ($_POST['updTypeOfMeal'] == 'normal')
    				    echo "Normal";
    			    elseif ($_POST['updTypeOfMeal'] == 'loss')
    				    echo "Loss";
    				else
    				    echo "Gain";
    				?>" disabled="disabled">
    			</div>
    			<div class="form-group">
    				<label for="updFoodId">Food Name:</label>
    				<?php
                    $id = $_POST["updFoodId"];
                    $foodDao = new FoodListDao();
                    $food = $foodDao->getFoodByFoodId($id);
                    foreach ($food as $key => $value) {
                    ?>
        				<input type="text" name="updFoodId" class="form-control"
    					value="<?php echo $value['food_name']?>" disabled="disabled">
        			<?php
                    }
                    ?>
    			</div>
    			<div class="form-group">
    				<label for="updEatTime">Eating Time:</label>
    				<input type="text" name="updEatTime" class="form-control"
					value="<?php
                        if ($_POST['updEatTime'] == 1)
                            echo "breakfast";
                        elseif ($_POST['updEatTime'] == 2)
                            echo "lunch";
                        elseif ($_POST['updEatTime'] == 3)
                            echo "snack";
                        else
                            echo "dinner";
                        ?>"
					disabled="disabled">
    			</div>
    			<div class="form-group">
    				<label for="updMealDesc">Description</label>
    				<textarea name="updMealDesc" rows="5" cols="20" class="form-control" disabled="disabled"><?php echo htmlspecialchars(@$_POST['updMealDesc']) ?></textarea>
    			</div>
                <div class="form-group">
                    <label for="image">Choose Image:</label>
                    <img src="images/meal/<?php echo $_SESSION["updmealphoto"] ?>" width="200px">
                </div>
    			<input type="submit" name="btnMealUpdConfirm" value="Confirm" class="btn btn-success">
    			<input type="submit" name="btnMealUpdConfirmCancel" value="Cancel" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
    }
}