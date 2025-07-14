<?php
class AdminFoodAddView extends View{
	private $errors;
	public function __construct($errors=null){
		$this->errors = $errors;
	}
	
	public function displayBody(){
?>
	<div class="col-6 col-12">
		<h3 style="font-family: Tahoma; color: #65ab3b;">Add Food</h3>
		<form method="post">
			<div class="form-group">
				<label for="foodName">Food Name:</label>
				<input type="text" name="foodName" value="<?php echo htmlspecialchars(@$_POST["foodName"]) ?>" placeholder="Enter Food Name..." class="form-control">
				<font color="red">
					<?php
						if(isset($this->errors["fname_null"]))
							echo $this->errors["fname_null"];
					?>
				</font>
			</div>
			<div class="form-group">
				<label for="catId">Category:</label>
				<select name="catId" class="form-control">
					<option value="0">--Choose Category--</option>
				<?php 
				    $categorydao = new CategoryDao();
				    $allCategory = $categorydao->getAllCategory();
				    foreach ($allCategory as $key=>$cat){
				        $catId = $cat["cat_id"];
				        $catName = $cat["cat_name"];
				?>
					<option value="<?php echo $catId ?>">
						<?php echo $catName ?>
					</option>
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
				<label for="foodDescription">Food Description</label>
				<textarea name="foodDescription" rows="5" cols="20" class="form-control" placeholder="Enter Description..."><?php echo htmlspecialchars(@$_POST["foodDescription"]) ?></textarea>
				<font color="red">
					<?php
						if(isset($this->errors["fdesc_null"]))
							echo $this->errors["fdesc_null"];
					?>
				</font>
			</div>
			<input type="submit" name="btnFoodAdd" value="Add" class="btn btn-success">
			<input type="submit" name="btnFoodAddCancel" value="Cancel" class="btn btn-success">
			<font color="red">
				<?php
					if(isset($this->errors["all_null"]))
						echo $this->errors["all_null"];
					
					if(isset($this->errors["food_exit"]))
						   echo $this->errors["food_exit"];
				?>
			</font>
			
		</form>
	</div>
	<br>
<?php 
	}
}