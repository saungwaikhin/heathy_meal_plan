<?php

class RegistrationController
{

    public function renderRegisterEdit()
    {
        return new RegisterEditView();
    }

    public function renderRegisterConfirm()
    {
        $regName = $_POST["regName"];
        $regPass = $_POST["regPass"];
        $regCPass = $_POST["regCPass"];
        $regEmail = $_POST["regEmail"];
        $regUserName = $_POST["regUserName"];
        $regPhone = $_POST["regPhone"];
        $regDoB = $_POST["regDob"];
        $regGender = @$_POST["gender"];
        
        if ($regName == "" && $regPass == "" && $regCPass == "" && $regEmail == "" && $regUserName == "" && $regDoB == "" && ($regGender != "m" || $regGender != "v"))
            $errors["all_null"] = "Please Enter All Required Fields.";
        else {
            // For UserName
            if ($regUserName == "")
                $errors["username_null"] = "Please Enter User Name.";
            
            if ($regUserName != "") {
                // echo "UName is Before ".$regUserName;
                
                $pattern = "/^[a-z0-9]{4,12}$/";
                if (! preg_match($pattern, $regUserName))
                    $errors["invalid_username"] = "Invalid username.";
                
                // echo "UName is".$regUserName;
                $userdao = new UserDao();
                $user = $userdao->getUserByUserName($regUserName);
                // print_r($user);
                if (! empty($user))
                    $errors["user_exist"] = "User already exist!";
            }
            // For Password and Confirm Password
            if ($regPass == "")
                $errors["pass_null"] = "Please Enter Password.";
            if ($regCPass == "")
                $errors["cpass_null"] = "Please Enter Confirm Password.";
            if ($regPass != "" && $regCPass != "") {
                if ($regPass != $regCPass) {
                    
                    $errors["pass_notMatched"] = "Password and Confirm Password must be same.";
                }
            }
            
            // name
            if ($regName == "")
                $errors["name_null"] = "Please Enter Name.";
            // For Email
            if ($regEmail == "")
                $errors["email_null"] = "Please Enter Email.";
            if ($regEmail != "") {
                $pattern = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
                if (! preg_match($pattern, $regEmail))
                    $errors["invalid_email"] = "Invalid email";
            }
            
            if ($regDoB == "")
                $errors["dob_null"] = "Please Enter Birthday";
            if ($regDoB != "") {
                //create date format
                $todaydate = date_create(date('Y-m-d'));
                $regDate = date_create($regDoB);
                //sub two date
                $diff = date_diff($regDate, $todaydate);
                $yearOld = (int)$diff->format("%R%y");//get two diff year
                //echo "Old" . $yearOld;

                if ($yearOld < 13)
                    $errors["invalid_less_null"] = "You must be over 13 years old";
                elseif ($yearOld >= 65)
                    $errors["invalid_great_null"] = "You must be under 65 years old";
            }
            // For Gender
            if (! isset($regGender))
                $errors["gender_null"] = "Select Gender Type.";
            if ($regGender == "m")
                $regGender = "m";
            elseif ($regGender == "f")
                $regGender = "f";
        }
        
        // For Phone
        if ($regPhone != "") {
            $pattern = "/^[0](\d{1,2})-(\d{5,9})$/";
            if (! preg_match($pattern, $regPhone))
                $errors["invalid_phone"] = "Invalid Phone";
        }
        
        if (! empty($errors))
            return new RegisterEditView($errors);
        
        if (empty($errors)) {
            
            $user = new User();
            $user->setUserName($regUserName);
            $user->setPassword($regPass);
            $user->setEmail($regEmail);
            $user->setName($regName);
            $user->setPhone($regPhone);
            $user->setDoB($regDoB);
            $user->setGender($regGender);
            
            $_SESSION["reg_user"] = $user;
            
            return new RegisterConfirmView();
        }
    }

    public function renderRegisterSave()
    {
        $userdao = new UserDao();
        $userdao->saveUser();
        return new RegisterSaveView();
    }
}
		
	