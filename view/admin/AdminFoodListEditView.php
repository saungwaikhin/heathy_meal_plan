<?php
	class AdminFoodListEditView extends View{
		private $errors;
		public function __construct($errors=null){
			$this->errors = $errors;
		}

		public function displayBody(){
		    $foodDao = new FoodListDao();
		    $id = $_GET["id"];
		    $food = $foodDao->getFoodByFoodId($id);
		    //print_r($food);
?>
	<div class="col-6 col-12">
		<h3 style="font-family: Tahoma; color: #65ab3b;">Edit Food</h3>
		<form method="post">
			<input type="hidden" name="foodId" value="<?php echo $id; ?>">
			<div class="form-group">
				<label for="updFoodName">Food Name:</label>
				<input type="text" name="updFoodName" value="<?php echo $food[0]['food_name'] ?>" class="form-control">
				<font color="red">
					<?php
						if(isset($this->errors["fname_null"]))
							echo $this->errors["fname_null"];
					?>
				</font>
			</div>
			<div class="form-group">
				<label for="updCategory">Category:</label>
				<select name="updCategory" class="form-control">
					<option value="">--Choose Category--</option>
					<?php 
					   $categorydao = new CategoryDao();
					   $allCategory = $categorydao->getAllCategory();
					   foreach ($allCategory as $key=>$cat){
					       $catId = $cat["cat_id"];
					       $catName = $cat["cat_name"];
					?>		
				    	<option value="<?php echo $catId?>"><?php echo $catName ?></option>
				    <?php
					   }
					?>
					
				</select>
				<font color="red">
					<?php
						if(isset($this->errors["cat_null"]))
							echo $this->errors["cat_null"];
					?>
				</font>
			</div>
			<div class="form-group">
				<label for="updFoodDescription">Food Description</label>
				<textarea name="updFoodDescription" rows="5" cols="20" class="form-control" ><?php echo $food[0]['food_desc'] ?></textarea>
				<font color="red">
					<?php
						if(isset($this->errors["fdesc_null"]))
							echo $this->errors["fdesc_null"];
					?>
				</font>
			</div>
			<input type="submit" name="btnFoodUpdate" value="Update" class="btn btn-success">
			<input type="submit" name="btnFoodUpdateCancel" value="Cancel" class="btn btn-success">
			<font color="red">
				<?php
					if(isset($this->errors["all_null"]))
						echo $this->errors["all_null"];
				?>
			</font>
		</form>
	</div>
<?php
		}
	}
?>