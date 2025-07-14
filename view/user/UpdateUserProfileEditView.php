<?php
class UpdateUserProfileEditView extends View{
    private $errors;
    
    public function __construct($errors=null,$getUserPhoto=null){
        $this->errors = $errors;
        
    }
    
	public function displayBody(){?>
	<div class="container">
	 
	<form action="" method="post" enctype="multipart/form-data" style="text-align: center;">
	<br>
	<h3 style="color: lightgreen">Update User Profile</h3>
	<br>
		<div class="row"> 
		<div class="col-sm-6" >
			<div class="col-sm-7">
		
			<div class="row">
				<div class="col-sm-6">
				<?php 
				if(empty($_SESSION["loginUser"][0]['photo'])){
				$gender = $_SESSION["loginUser"][0]['gender'];
					if($gender == 'f'){
					echo "<img alt='' src='images/female.jpg'>";
					}
						else {
						echo "<img alt='' src='images/male.jpg'>";
						}
					
				}else{?>
					
					<img alt="My Photo" src="images/user/<?php echo $_SESSION["loginUser"][0]['photo'];?>" height="170px" width="150px">
				<?php }?>
				
				</div>
				
				<div class="col-sm-2">
				<br> <br> 
				<div class="col-sm-6">
					
					<input type="file" name="<?php echo ELEMENT?>" value="Photo">
				</div> 
				<br>
				<div class="col-sm-6">
					<input type="submit" name="btnUpload" value="Upload" >
				</div>
				</div>
			</div>
			
			
			</div>
			<br> 
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updUserName">User Name:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="updUserName"
							name="updUserName" value="<?php echo $_SESSION["loginUser"][0]['username'];?>" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="form-group ">
				<div class="row">
					<div class="col-sm-3">
						<label for="date"> DOB: </label>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="Dob" name="regDob"
							placeholder="MM/DD/YYYY" value="<?php echo $_SESSION["loginUser"][0]['dob'];?>" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updGender">Gender:</label>
					</div>
					<?php 
					$gender = $_SESSION["loginUser"][0]['gender'];
					if($gender == 'f'){
					?>
						<div class="col-sm-2">
    						<label class="radio-inline"><input type="radio" name="regGender"
    							value="male" disabled="disabled"> Male </label>
    					</div>
    					<div class="col-sm-3">
    						<label class="radio-inline"> <input type="radio" name="regGender"
    							value="female" checked="checked" disabled="disabled"> Female </label>
    					</div>
    				
					<?php    
					}else {
					?>
						<div class="col-sm-6">
    						<label class="radio-inline"><input type="radio" name="regGender"
    							value="male" checked="checked" disabled="disabled"> Male </label>
    					
    					&nbsp; &nbsp;
    					
    						<label class="radio-inline"> <input type="radio" name="regGender"
    							value="female"  disabled="disabled"> Female </label>
    
    					</div>
					<?php     
					}
					?>
					
				</div>

			</div>
			
		</div>
		
		<div class="col-sm-6" >
		

			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updName">Name:</label>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="updName"
							name="updName" value="<?php 
						if(isset($_POST["updName"]))
							echo $_POST["updName"];
						else
							echo $_SESSION["loginUser"][0]['name'];?>" >
					</div>
					<div>
						<font color="red"><?php 
							if(isset($this->errors["name_null"]))
								echo $this->errors["name_null"];
						?></font>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updPass">Password:</label>
					</div>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="updPass"
							name="updPass" value="<?php 
						if(isset($_POST["updPass"]))
							echo $_POST["updPass"];
						else
							echo $_SESSION["loginUser"][0]['password'];?>">
					</div>
					<div>
						<font color="red"><?php 
							if(isset($this->errors["pass_null"]))
								echo $this->errors["pass_null"];
						?></font>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updCPass">Confirm Password:</label>
					</div>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="updCPass"
							name="updCPass" value="<?php 
						if(isset($_POST["updCPass"]))
							echo $_POST["updCPass"];
						else
							echo $_SESSION["loginUser"][0]['password'];?>">
					</div>
					<div>
						<font color="red"><?php 
							if(isset($this->errors["cpass_null"]))
								echo $this->errors["cpass_null"];
							if(isset($this->errors["pass_notMatched"]))
								echo $this->errors["pass_notMatched"];
						?></font>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updEmail">Email:</label>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="updEmail"
							name="updEmail" value="<?php 
						if(isset($_POST["updEmail"]))
							echo $_POST["updEmail"];
						else	
							echo $_SESSION["loginUser"][0]['email'];?>">
					</div>
					<div>
						<font color="red"><?php 
							if(isset($this->errors["email_null"]))
								echo $this->errors["email_null"];
							if(isset($this->errors["invalid_email"]))
								echo $this->errors["invalid_email"];
						?></font>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="updPhone">Phone:</label>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="updPhone"
							name="updPhone" value="<?php 
						if(isset($_POST["updPhone"]))
							echo $_POST["updPhone"];
						else
							echo $_SESSION["loginUser"][0]['phone'];?>">
					</div>
					<div>
						<font color="red">
							<?php 
							if(isset($this->errors["invalid_phone"]))
								echo $this->errors["invalid_phone"];
						    ?>
						</font>
					</div>
				</div>
			</div>
<div class="row">
<div class="col-sm-3"> </div>
<div class="col-sm-5">
<font color="red">                                                                                                                                                                                                                       
	<?php 
		if(isset($this->errors["all_null"]))
			echo $this->errors["all_null"];	
									
	?>
</font>
</div>
</div>
			<div class="form-group">
				<div class="row">
				<div class="col-sm-3"> </div>
					<div class="col-sm-5">

						<input type="submit" class="click_btn" name="btnUpdateProfile" value="Update"> 
						<input type="submit" class="click_btn"name="btnUserProfileCancel" value="Cancel">
						
					</div>
				</div>
			</div>
		
		</div>
		</div>
</form>

</div>

	<?php }
}
