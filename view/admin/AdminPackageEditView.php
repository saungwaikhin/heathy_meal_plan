<?php
class AdminPackageEditView extends View{
    private $errors;
    public function __construct($errors=null){
        $this->errors = $errors;
    }
    
    public function displayBody(){
    	$packagedao = new PackageDao();
    	$packageId = $_GET["id"];
    	//echo $packageId;
    	$package = $packagedao->getPackageById($packageId);
    	//print_r($package);
?>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Edit Package</h3>
			<form method="post">
				<input type="hidden" name="packageId" value="<?php echo $packageId; ?>">
				<div class="form-group">
    				<label for="updPName">Package Name:</label>
    				<input type="text" name="updPName" class="form-control" value="<?php echo $package[0]["package_name"] ?>">
    				<font color="red">
    					<?php 
    					   if(isset($this->errors["name_null"]))
    					       echo $this->errors["name_null"];
    					?>
    				</font>
    			</div>
    			<div class="form-group">
    				<label for="updPDay">Days:</label>
    				<input type="text" name="updPDay" class="form-control" value="<?php echo $package[0]["package_type"] ?>">
    				<font color="red">
    					<?php 
    					   if(isset($this->errors["day_null"]))
    					       echo $this->errors["day_null"];
    					?>
    				</font>
    			</div>
    			<div class="form-group">
    				<label for="updPDescription">Package Description</label>
    				<textarea name="updPDescription" rows="5" cols="20" class="form-control"><?php echo $package[0]["package_desc"] ?></textarea>
    				<font color="red">
    					<?php 
    					   if(isset($this->errors["desc_null"]))
    					       echo $this->errors["desc_null"];
    					?>
    				</font>
    			</div>
    			<input type="submit" name="btnPackageUpd" value="Update" class="btn btn-success">
    			<input type="submit" name="btnPackageUpdCancel" value="Cancel" class="btn btn-success">
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