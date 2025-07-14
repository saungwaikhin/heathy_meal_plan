<?php
class AdminUpdateProfileController{
	public function renderAdminUpdateProfile(){
		return new AdminUpdateProfileEditView();
	}
	public function renderAdminProfileCancel(){
		return new AdminHomeView();
	}
}