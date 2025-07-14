<?php
class UpdateUserProfileController{
	public function UpdateUserProfileEdit(){
		return new UpdateUserProfileEditView();
	}
	public function updateProfileConfirm(){
	    $updName = $_POST["updName"];
	    $updEmail = $_POST["updEmail"];
	    $updPass = $_POST["updPass"];
	    $updCPass = $_POST["updCPass"];
	    $updPhone= $_POST["updPhone"];
	    
	    if($updName =="" && $updEmail =="" && $updPass =="" && $updCPass ==""){
	        $errors["all_null"] = "Enter all required fields.";
	    }else{
	        if($updName=="")
	            $errors["name_null"] = "Enter name.";
	            
	            if($updEmail=="")
	                $errors["email_null"] = "Enter email.";
	                if($updEmail!=""){
	                    $pattern = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
	                    if(!preg_match($pattern, $updEmail))
	                        $errors["invalid_email"] = "Invalid Email.";
	                }
	                
	                if($updPass=="")
	                    $errors["pass_null"] = "Enter password.";
	                    if($updCPass=="")
	                        $errors["cpass_null"] = "Enter confirm password.";
	                        if($updPass!="" && $updCPass!="")
	                            if($updPass!=$updCPass)
	                                $errors["pass_notMatched"] = "Password must be same.";
	                                
	    }
	    if($updPhone!=""){
	        $pattern = "/^[0](\d{1,2})-(\d{5,9})$/";
	        if(!preg_match($pattern, $updPhone))
	            $errors["invalid_phone"] = "Invalid Phone";
	    }
	    
	    if(!empty($errors))
	        return new UpdateUserProfileEditView($errors);
	    
	        if(empty($errors)){
	            
	            $user[0]["name"] = $updName;
	            $user[0]["email"] = $updEmail;
	            
	            if($updPass == $_SESSION["loginUser"][0]["password"])
	                $user[0]["password"] = $updPass;
	                else
	                    $user[0]["password"] = md5($updPass);
	                    
	                    $user[0]["phone"] = $updPhone;
	                    $user[0]["username"] = $_SESSION["loginUser"][0]["username"];
	                    $user[0]["gender"] = $_SESSION["loginUser"][0]["gender"];
	                    $user[0]["dob"] = $_SESSION["loginUser"][0]["dob"];
	                    $user[0]["user_id"] = $_SESSION["loginUser"][0]["user_id"];
	                    
	                    $_SESSION["update_user"] = $user;
	                    
	                    // print_r($_SESSION["update_user"]);
	                    
	                    return new UpdateProfileConfirmView();
	        }
	}
	public function updateProfileSave(){
	    $userdao = new UserDao();
	    $userdao->updateUser();
	    return new updateProfileSaveView();
	    
	  
	
	}
public function updateProfilePhotoSave(){
		$dest_path=store_uploaded_file(ELEMENT, "./images/user/");
   		$_SESSION["photo"]=$dest_path;
		  $userdao = new UserDao();
	    $userPhoto=$userdao->updateProfilePhoto();
		return new UpdateUserProfileEditView();
	}
}