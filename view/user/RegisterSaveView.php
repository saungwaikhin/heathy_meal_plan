<?php
class RegisterSaveView extends ViewLogin{
	public function displayBody(){?>
		
		<div class="container">
			<div class="row" style="padding-top: 40px;">
				<div
					style="margin: auto; width: 550px; border: 1px solid silver; padding: 10px 30px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
					<img src="./images/logo.png" width=150px alt="logo" />
					<form action="#" method="post">
						<div>
							<p class="head">Register Successful</p>
						</div>
						<div class="form-group">
							<input type="submit" value="Ok" name="btnBack" class="btn btn-outline-success">
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php }
}