<?php
class LoginController{
	function renderLogin(){
		return new LoginView();
	}
	
	public function renderLoginCheck(){
		if($_POST["loginName"]=="" && $_POST["loginPassword"]=="")
		$errors["all_null"]="Please Enter required fields.";
		else{
			if ($_POST["loginName"]=="")
			$errors["lname_null"]="Please Enter login name.";
			if($_POST["loginPassword"]=="")
			$errors["pass_null"]="Please Enter login password";
			if($_POST["loginName"]!="" && $_POST["loginPassword"] != ""){
				$userdao=new UserDao();
				$user=$userdao->getUserByUserName($_POST["loginName"]);

				if(empty($user)){
					$errors["invalid_user"]="Invalid User!";
				}else {
					if($user[0]["password"]!=md5($_POST["loginPassword"]))
					$errors["wrong_pass"]="Worng Password";
				}
			}
		}
		if(!empty($errors))
		return new LoginView($errors);
		else {
			$_SESSION["loginUser"]=$user;
			if ($_SESSION["loginUser"][0]["role"]==1)
			return new AdminHomeView();
			else
			return new HomeView();
		}

	}
	public function renderLoginAdminCheck(){
		$_SESSION["loginAdmin"]="OK";
		return new AdminHomeView();
	}
}