<?php
class AdminUpdateProfileEditView extends View{
public function displayBody(){?>
<div class="container" >

	<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Change Password</p>
	</div>
</div>
	

		<div class="text-center">
			<form method="post">

				<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="regPass">Current Password:</label>
							</div>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regCurrentPass" name="regCurrentPass" value="12345">
							</div>
							<div class="col-sm-1">
							<font color="red">***</font>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="regPass">New Password:</label>
							</div>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regPass" name="regPass" value="12345">
							</div>
							<div class="col-sm-1">
							<font color="red">***</font>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="regPass">Confirm New Password:</label>
							</div>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regPass" name="regCPass" value="12345">
							</div>
							<div class="col-sm-1">
							<font color="red">***</font>
							</div>
						</div>
					</div>

						<div class="form-group">
							<div class="row">
							
							<div class="col-sm-3">
								
							</div>
							<input type="submit" class="click_btn"  name="btnUpdateProfile" value="Update">
					
							<input type="submit" class="click_btn" name="btnAdminProfileCancel" value="Cancel">
							
							
						</div>
				</div>
			</form>
		</div>
		</div>
<?php }
	

	
}
