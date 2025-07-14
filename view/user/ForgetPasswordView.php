<?php
class ForgetPasswordView extends ViewLogin{
	private $errors;
	public function __construct($errors=null){
		$this->errors=$errors;
	}
	public function displayBody(){?>

<div class="row" style="padding-top: 70px;">
	<div
		style="margin: auto; width: 450px; border: 1px solid silver; padding: 10px 30px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
		<img src="./images/logo.png" width=150px alt="logo" />
		<p class="head">Forgot Password</p>
		<form method="post">
		
		<div class="input-group mb-3">
				<div class="input-group-prepend" style="width: 70px;">
					<span class="input-group-text">Email:</span>
				</div>
		
			<input type="text" name="forgetPassEmail" class="form-control" placeholder="Email"
			value="<?php 
			echo @$_POST['forgetPassEmail']?>">
		</div>
			
			<div class="row" style="margin: 0px 0px 10px 10px;">
				
				<font color="red">
			
				<?php 
				if(isset($this->errors["email_null"])) 
					echo$this->errors["email_null"];
					
				 if(isset($this->errors["invalid_email"]))
				  echo$this->errors["invalid_email"];
				
				if(isset($this->errors["email_empty"]))
				  echo$this->errors["email_empty"];
				?> </font>
			</div>
	
	
	
		<div style="margin:100;">
			<input type="submit" name="btnForgetPassSend" value="Send"
						class="btn btn-outline-success">
				
			<input type="submit" name="btnForgetPassCodeCancel" value="Cancel"
						class="btn btn-outline-success">
		</div>
		
		</form>
		</div>
		
</div>
	<?php }
}