<?php

class ForgetPasswordCodeView extends ViewLogin
{
    private $errors;
    
    public function __construct($errors=null){
        $this->errors=$errors;
    }

    public function displayBody()
    {
        ?>
<div class="row" style="padding-top: 70px;">
	<div
		style="margin: auto; width: 250px; border: 1px solid silver; padding: 10px 30px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
		<img src="./images/logo.png" width=150px alt="logo" />
		<p class="head">Forgot Password</p>
		<form method="post">

			<div class="input-group mb-3">
				<div class="input-group-prepend" style="width: 60px;">
					<span class="input-group-text">Code</span>
				</div>
					
						<input type="text" class="form-control" id="forgetPassCode"
							name="forgetPassCode"><font color="red"><?php
							if(isset($this->errors["code_miss"]))
							    echo $this->errors["code_miss"];
							
							if(isset($this->errors["code_null"]))
							    echo $this->errors["code_null"];
							?>
							</font>
			</div>		


				
			

				
				<input type="submit" name="btnForgetPassCodeSend" value="Send"
					class="btn btn-outline-success">
			



		</form>
	</div>
</div>

<?php

	}
}