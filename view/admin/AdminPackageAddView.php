<?php
class AdminPackageAddView extends View{
    private $errors;
    public function __construct($errors=null){
        $this->errors = $errors;
    }
    
	public function displayBody(){
?>
	<div class="col-6 col-12">
		<h3 style="font-family: Tahoma; color: #65ab3b;">Add Package</h3>
		<form method="post">
			<div class="form-group">
				<label for="pName">Package Name:</label>
				<input type="text" name="pName" placeholder="Enter Package Name..." class="form-control" value="<?php echo htmlspecialchars(@$_POST['pName']) ?>">
				<font color="red">
					<?php 
					   if(isset($this->errors["name_null"]))
					       echo $this->errors["name_null"];
					?>
				</font>
			</div>
			<div class="form-group">
				<label for="pDay">Days:</label>
				<input type="text" name="pDay" placeholder="Enter Package Days..." class="form-control" value="<?php echo htmlspecialchars(@$_POST['pDay']) ?>">
				<font color="red">
					<?php 
					   if(isset($this->errors["day_null"]))
					       echo $this->errors["day_null"];
					?>
				</font>
			</div>
			<div class="form-group">
				<label for="pdescription">Package Description</label>
				<textarea name="pDescription" rows="5" cols="20" class="form-control" placeholder="Enter Description..."><?php echo htmlspecialchars(@$_POST["pDescription"]) ?></textarea>
				<font color="red">
					<?php 
					   if(isset($this->errors["desc_null"]))
					       echo $this->errors["desc_null"];
					?>
				</font>
			</div>
			<input type="submit" name="btnPackageAdd" value="Add" class="btn btn-success">
			<input type="submit" name="btnPackageAddCancel" value="Cancel" class="btn btn-success">
			<font color="red">
				<?php 
			        if(isset($this->errors["all_null"]))
					   echo $this->errors["all_null"];
					   
					if(isset($this->errors["name_exist"]))
					   echo $this->errors["name_exist"];
				?>
			</font>
		</form>
	</div>
	<br>
<?php 
	}
}