<?php

class LoginView extends ViewLogin
{

    private $errors;

    public function __construct($errors = null)
    {
        $this->errors = $errors;
    }

    public function displayBody()
    {
        ?>


<div class="row" style="padding-top:70px;; ">
	<div 
		style="margin: auto; width: 350px; border: 1px solid silver; padding: 10px 30px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
		<a href="index.php?usecase=<?php echo UC_WELCOME ?>">
							<img src="./images/logo.png" width=150px alt="logo" />
						</a>
		<p class="head">Log in</p>
		<form method="post">
			<div class="input-group mb-3">
				<div class="input-group-prepend" style="width: 100px;">
					<span class="input-group-text">User Name</span>
				</div>
				<input type="text" class="form-control" id="loginName"
					placeholder="User name" name="loginName">
			<font color = "red">
			<?php 
				if (isset($this->errors["lname_null"]))
					echo $this->errors["lname_null"];
			?>
			</font>	
			
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend" style="width: 100px;">
					<span class="input-group-text">&nbsp;Password&nbsp; </span>
				</div>
				<input type="password" class="form-control" id="loginPassword"
					placeholder="Password" name="loginPassword">
					
				<font color = "red">	
				<?php 
				if (isset($this->errors["pass_null"]))
					echo $this->errors["pass_null"];
				?>	
				</font>
				
			</div>
			<input type="submit" class="btn btn-outline-success" name="btnLogin"
				value="Login">
				<hr>
			<font color = "red">
				<?php 
				if (isset($this->errors["wrong_pass"]))
					echo $this->errors["wrong_pass"];
				?>
			</font>	
			<font color = "red">
				<?php 
				if (isset($this->errors["invalid_user"]))
					echo $this->errors["invalid_user"];
				?>
			</font>		
			<p>
				New User? <a href="index.php?usecase=<?php echo UC_REG?>">Register</a>
			</p>
			<p>
				<a href="index.php?usecase=<?php echo UC_FORGET_PASS?>">Forgot Passowrd?</a>
			</p>
			<font color = "red">
			<?php 
				if (isset($this->errors["all_null"]))
					echo $this->errors["all_null"];
			?>
			</font>
			
			<!-- <hr>
			<input type="submit" class="btn btn-outline-success"
				name="btnLoginAdmin" value="Admin Login">

 -->


		</form>

	</div>
</div>



<?php
    }
}