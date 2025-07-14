<?php
class UpdateProfileConfirmView extends View{
	public function displayBody(){?>

<div class="container">
	

	<div class="text-center">
		<form action="#" method="post">
			<br>
			<h3 style="color: lightgreen">Are you sure to update?</h3>
			<br>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label for="updName">Name:</label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="updName" value="<?php echo $_POST['updName']; ?>" disabled="disabled">
						<input type="hidden" name="updName" value="<?php echo $_POST['updName']; ?>" >
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label for="updPass">Password:</label>
					</div>
					<div class="col-sm-3">
						<input type="password" class="form-control" name="updPass" value="<?php echo $_POST['updPass']; ?>" disabled="disabled">
						<input type="hidden" name="updPass" value="<?php echo $_POST['updPass']; ?>" >
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label for="updCPass">Confirm Password:</label>
					</div>
					<div class="col-sm-3">
						<input type="password" class="form-control" name="updCPass" value="<?php echo $_POST['updCPass']; ?>" disabled="disabled">
						<input type="hidden" name="updCPass" value="<?php echo $_POST['updCPass']; ?>" >
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label for="updEmail">Email:</label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="updEmail" value="<?php echo $_POST['updEmail']; ?>" disabled="disabled">
						<input type="hidden" name="updEmail" value="<?php echo $_POST['updEmail']; ?>" >
					</div>
					<div class="col-sm-4">
						
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label for="updPhone">Phone:</label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="updPhone" value="<?php echo $_POST['updPhone']; ?>" disabled="disabled">
						<input type="hidden" name="updPhone" value="<?php echo $_POST['updPhone']; ?>" >
					</div>
					<div class="col-sm-4"></div>

				</div>
			</div>
		
				<div class="form-group">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
						<input type="submit" class="click_btn"
							name="btnUpdateProfileConfirm" value="Confirm">
			
					
						<input type="submit" class="click_btn" name="btnCancel"
							value="Cancel">
						</div>
						<div class="col-sm-4"></div>
						
					</div>
					
				</div>
		

		</form>
	</div>
</div>


	<?php }
}
