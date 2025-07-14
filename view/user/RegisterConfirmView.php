<?php
class RegisterConfirmView extends ViewLogin{
	public function displayBody() { ?>

<div class="container">
	<div class="row" style="padding-top: 40px;">
		<div
			style="margin: auto; width: 550px; border: 1px solid silver; padding: 10px 30px 30px; border-radius: 10px; text-align: center; box-shadow: 3px 5px 20px 5px #888888;">
			<img src="./images/logo.png" width=150px alt="logo" />
			<form action="#" method="post">
				<div>
					<p class="head">Are You sure to Register?</p>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<label for="regUserName">User Name:</label>
						</div>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="regUserName"
								name="regUserName" value="<?php echo $_POST["regUserName"];?>"
								disabled="disabled">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<label for="regPass">Password:</label>
						</div>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="regPass"
								name="regPass" value="<?php echo $_POST["regPass"];?>"
								disabled="disabled">
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
								name="regCPass" value="<?php echo $_POST["regCPass"];?>"
								disabled="disabled">
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
								name="regName" value="<?php echo $_POST["regName"];?>"
								disabled="disabled">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<label for="regGender">Gender:</label>
						</div>
						<div class="col-sm-7">
							<label class="radio-inline">
							<?php if($_POST["gender"]=="m"){?>
							<input type="radio" name="gender" value="<?php echo $_POST["gender"];?>"  checked="checked" >Male 
							<input type="radio" name="gender" value="f">Female 
							<?php }		
							elseif($_POST["gender"]=="f"){?>
							<input type="radio" name="gender" value="m" >Male 
							<input type="radio" name="gender"<?php echo $_POST["gender"];?>" checked="checked">Female 
							<?php }		?>

						</div>
					</div>

				</div>

				<div class="form-group ">
					<div class="row">
						<div class="col-sm-4">
							<label for="regDob">Date of Birth:</label>
						</div>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="Dob" name="regDob"
								value="<?php echo $_POST["regDob"];?>" placeholder="YYYY-MM-DD"
								disabled="disabled">

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
								name="regEmail" value="<?php echo $_POST["regEmail"];?>"
								disabled="disabled">
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
								name="regPhone" value="<?php echo $_POST["regPhone"];?>"
								disabled="disabled">
						</div>

					</div>
				</div>
				<input type="submit" name="btnRegisterConfirm" value="Confirm"
					class="btn btn-outline-success"> <input type="submit"
					name="btnCRegister" value="Cancel" class="btn btn-outline-success">

			</form>
		</div>
	</div>
</div>


	<?php	}
}