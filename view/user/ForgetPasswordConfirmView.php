<?php

class ForgetPasswordConfirmView extends ViewLogin
{

    private $errors;

    public function __construct($errors = null)
    {
        $this->errors = $errors;
    }

    public function displayBody()
    {
        ?>
<div class="row" style="padding-top: 70px;">
	<div
		style="margin: auto; width: 490px; border: 1px solid silver; padding: 10px 50px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
		<img src="./images/logo.png" width=150px alt="logo" />
		<p class="head">Forgot Password</p>
		<form method="post">

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Password &emsp;&emsp;&emsp;</span>
				</div>
				<input type="password" name="forgetPass" ><font color="red">
				<?php 
						      if(isset($this->errors['pass_null']))
								echo $this->errors['pass_null'];?></font>	
		
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend" style="width: 150px;">
					<span class="input-group-text">Confirm Password</span>
				</div>
					
						<input type="password" name="forgetPassConPass" ><font color="red">
						<?php
						      if(isset($this->errors['cpass_null']))
								    echo $this->errors['cpass_null'];
								if(isset($this->errors['pass_notMatched']))
								    echo $this->errors['pass_notMatched'];
								?>	</font>							
					
				
			</div>

			<div>
				<input type="submit" name="btnForgetPassReset" value="Reset"
					class="btn btn-outline-success">
			</div>


		</form>
	</div>
</div>
<?php }
}