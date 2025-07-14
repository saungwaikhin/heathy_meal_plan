<?php
class RegisterEditView extends ViewLogin{
	private $errors;
	public function __construct($errors=null){
		$this->errors=$errors;
	}
	public function displayBody(){?>
	<link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
	<div class="signup-form">
		<div class="container">
			<div class="row" style="padding-top: 40px;">
				<div
					style="margin: auto; width: 550px; border: 1px solid silver; padding: 10px 30px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
					<a href="index.php?usecase=<?php echo UC_WELCOME ?>">
							<img src="./images/logo.png" width=150px alt="logo" />
						</a>
					
					<script type="text/javascript" src="./js/jsDatePick.min.1.3.js"></script>
					<script type="text/javascript">
					window.onload = function(){
						new JsDatePick({
						useMode:2,
						target:"inputField",
						dateFormat:"%Y-%m-%d"
						});
					};
					</script>
					<form action="#" method="post">
						<div>
							<p class="head">Create Account</p>
						</div>

						<!--For User Name-->
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regUserName">User Name:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="regUserName"
										name="regUserName" placeholder="thuthu01" value="<?php 
											if(isset($_SESSION["reg_user"]))
												echo $_SESSION["reg_user"]->getUserName();
											else	
											echo @$_POST["regUserName"];?>">
									<font color="red"> 
										<?php 
										if(isset($this->errors["username_null"]))
											echo $this->errors["username_null"];
											
										if(isset($this->errors["invalid_username"]))
											echo $this->errors["invalid_username"];
										?>
									</font>
								</div>
								<div class="col-sm-1">
									<font color="red">***</font>
								</div>
							</div>
						</div>
						
						<!--Password and Confirm Password-->
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regPass">Password:</label>
								</div>
								<div class="col-sm-7">
									<input type="password" class="form-control" id="regPass"
										name="regPass" value="<?php
									if(isset($_SESSION["reg_user"]))
									echo $_SESSION["reg_user"]->getPassword();
								else
									echo @$_POST["regPass"];?>">
										
									<font color="red">
										<?php 
										if(isset($this->errors["pass_null"]))
											echo $this->errors["pass_null"];
										?>
									</font>
								</div>
								<div class="col-sm-1">
									<font color="red">***</font>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regCPass">Confirm Password:</label>
								</div>
								<div class="col-sm-7">
									<input type="password" class="form-control" id="regCPass"
										name="regCPass" value="<?php 
									if(isset($_SESSION["reg_user"]))
									echo $_SESSION["reg_user"]->getPassword();
								else
									echo @$_POST["regCPass"];?>">
										
									<font color="red">
										<?php 
										if(isset($this->errors["cpass_null"]))
											echo $this->errors["cpass_null"];

										if(isset($this->errors["pass_notMatched"]))
											echo $this->errors["pass_notMatched"];
										?>
									</font>
								</div>
								<div class="col-sm-1">
									<font color="red">***</font>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regName">Name:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="regName"
										name="regName" value="<?php 
								if(isset($_SESSION["reg_user"]))
									echo $_SESSION["reg_user"]->getName();
								else	
								echo @$_POST["regName"];?>">
									<font color="red">
										<?php 
										if(isset($this->errors["name_null"]))
											echo $this->errors["name_null"];
										?>
									</font>
								</div>
								<div class="col-sm-1">
									<font color="red">***</font>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regGender">Gender:</label>
								</div>
								<div class="col-sm-7">
							<input type="radio" name="gender" value="m"  >Male 
							<input type="radio" name="gender" value="f" >Female <font color="red">***</font> 															
									<div>
									<font color="red">
										<?php 
										if(isset($this->errors["gender_null"]))
											echo $this->errors["gender_null"];
									?>
									</font>
									</div>
									
								</div>
							</div>

						</div>

						<div class="form-group ">
							<div class="row">
								<div class="col-sm-4">
									<label for="regDob">Date of Birth:</label>
								</div>
								<div class="col-sm-7">
									<input type="date" class="form-control" id="inputField" name="regDob"
										placeholder="YYYY-MM-DD" value="<?php 
								if(isset($_SESSION["reg_user"]))
									echo $_SESSION["reg_user"]->getDoB();
								else	
								echo @$_POST["regDoB"];?>">
								<font color="red">
										<?php 
										if(isset($this->errors["dob_null"]))
											echo $this->errors["dob_null"];
											
										if(isset($this->errors["invalid_less_null"]))
											echo $this->errors["invalid_less_null"];
											
										if(isset($this->errors["invalid_great_null"]))
											echo $this->errors["invalid_great_null"];
										?>
									</font>
								</div>
								<div class="col-sm-1">
									<font color="red">***</font>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regEmail">Email:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="regEmail"
										name="regEmail" placeholder="xxx@gmail.com" value="<?php 
								if(isset($_SESSION["reg_user"]))
									echo $_SESSION["reg_user"]->getEmail();
								else	
								echo @$_POST["regEmail"];?>">
								<font color="red">
								<?php 
									if(isset($this->errors["email_null"]))
										echo $this->errors["email_null"];
										
									if(isset($this->errors["invalid_email"]))
										echo $this->errors["invalid_email"];
								?>
								</font>
								</div>
								<div class="col-sm-1">
									<font color="red">***</font>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="regPhone">Phone:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="regPhone"
										name="regPhone" placeholder="09-xxxxxxxxx" value="<?php 
								if(isset($_SESSION["reg_user"]))
									echo $_SESSION["reg_user"]->getPhone();
								else
									echo @$_POST["regPhone"];?>">
									<font color="red">
										<?php 
										if(isset($this->errors["invalid_phone"]))
											echo $this->errors["invalid_phone"];
										?>
									</font>
								</div>

							</div>
						</div>
						
						<div class="form-group">
						<input type="submit" name="btnRegister" value="Register" class="btn btn-outline-success"> 
						<input type="submit" name="btnBack" value="Cancel" class="btn btn-outline-success">
						</div>
						<div>
							<font color="red">                                                                                                                                                                                                                       
							<?php 
								if(isset($this->errors["all_null"]))
									echo $this->errors["all_null"];
								
								if(isset($this->errors["user_exist"]))
									echo $this->errors["user_exist"];
									
							?>
							</font>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php 	}
	}