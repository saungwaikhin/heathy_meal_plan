<?php

class ForgetPasswordController
{

    public function renderForgetPass()
    {
        if (isset($_POST["btnForgetPassSend"])) {
            $to_email = $_POST['forgetPassEmail'];
            $forgetPassworddao = new UserDao();
            $forgetPassword = $forgetPassworddao->getForgetPassword($to_email);
            
            if ($_POST["forgetPassEmail"] == "")
                $errors["email_null"] = "Please Enter Mail";
            else {
                $pattern = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";

                if (! preg_match($pattern, $_POST["forgetPassEmail"]))
                {$errors["invalid_email"] = "Invalid Email";
                }else{
                        if($forgetPassword != $_POST['forgetPassEmail']){
                                $errors["email_empty"]="Email is not found!";
                             }
                      }
                }
            
                //echo !extension_loaded('openssl')?"Not Available":"Available";
            
            if (! empty($forgetPassword)) {
                
                $_SESSION["forget_email"] = $to_email;
                $from_email = "test2phpmail@gmail.com";
                $from_password = "php123456";
                $forget_pass = mt_rand(100000, 1000000);
                $_SESSION["forget_password"] = $forget_pass;
                $forgetPassworddao->saveCode($forget_pass, $to_email);

                // $update_pass=md5($forget_pass);
                // $updatepassword=$forgetPassworddao->updateForgetPassword($update_pass,$to_email);
                // $user[0]["password"]=$forget_pass;
                // $updateForgetPass=$forgetPassworddao->updateForgetPassword($_POST["forgetPassEmail"]);

                $message = "";
                $message .= "Your forget Password is $forget_pass";
                $subject = "Subject ";

                $mail = new PHPMailer();
                $mail->isSMTP(); // set mailer to use SMTP
                //$mail->Host = 'smtp.gmail.com'; // my host here
                $mail->Host = "smtp.gmail.com";//for window
                $mail->Port = 587; // Set the SMTP port number - likely to be 25, 465 or 587
                $mail->SMTPSecure = 'tls'; // Transport Layer Security
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->Username = $from_email; // a valid email here
                $mail->Password = $from_password; // the password from email
                $mail->addAddress($to_email);
                $mail->Subject = $subject;
                $mail->msgHTML($message);
                $mail->FromName = "Support Team"; // Root User Name

                /**
                 * *************************
                 */
                // Set who the message is to be sent to
                // $mail->addAddress('whoto@example.com', 'John Doe');
                // Read an HTML message body from an external file, convert referenced images to embedded,
                // convert HTML into a basic plain-text alternative body
                // $mail->msgHTML(file_get_contents('contents.html'),dirname(__FILE__));
                // Replace the plain text body with one created manually
                // $mail->AltBody = 'This is a plain-text message body';
                /**
                 * *****************************
                 */
                if (! $mail->send()) {
                    $errors = "Mailer Error: " . $mail->ErrorInfo;
                    ?>
<script>alert('<?php echo $errors ?>');</script>
<?php
                } else {
                    echo '<script>alert("Message sent!");</script>';
                }
                return new ForgetPasswordCodeView();
            } // if(!empty($forgetPassword))

            return new ForgetPasswordView(@$errors);
        } else
            return new ForgetPasswordView(); // btnForgetPassSend end

        // if(isset($_POST["btnForgetPassSend"])){
        // if($_POST["btnForgetPassCodeSubmit"]==$forget_pass){
        // return new ForgetPasswordConfirmView();
        // }

        // }// btnForgetPassSend end
    }

    // function end
    public function renderForgetPasswordConfirm()
    {
        // echo "Save";
        $forgetPassworddao = new UserDao();
        $getCode = $forgetPassworddao->getForgetPassword($_SESSION["forget_email"]);
        if (isset($_SESSION["forget_email"]))
        // print_r($getCode);
        if($_POST["forgetPassCode"] == ""){
            $errors["code_null"] = "Please Enter Code!";
        }else{
             if ($getCode[0]["code"] == $_POST["forgetPassCode"]) {
                  return new ForgetPasswordConfirmView();
             }else{
              
                 $errors["code_miss"]="Code Number is wrong!";}
        }
        
                
       
            
            return new ForgetPasswordCodeView($errors);
        }

        // return new ForgetPasswordConfirmView();
        // }//renderForgetPasswordConfirm end
        // public function renderForgetPasswordCode(){
        // return new ForgetPasswordConfirmView();
  //  }

    public function renderForgetPasswordSave()
    {
        $forgetPass = $_POST["forgetPass"];
        $forgetCPass = $_POST["forgetPassConPass"];
       // if (isset($_POST["btnForgetPassSubmit"])) {
            if ($forgetPass == "")
                $errors["pass_null"] = "Please Enter password";
            if ($forgetCPass == "")
                $errors["cpass_null"] = "Please Enter confirm password";

            if ($forgetPass != "" && $forgetCPass != "") {
                if ($forgetPass != $forgetCPass){
                    echo "Password and Confirm Password must be same.";
                    $errors["pass_notMatched"] = "Password and Confirm Password must be same.";
                }
            }
            if (! empty($errors))
                return new ForgetPasswordConfirmView(@$errors);
            if (empty($errors)) {
                $Password = md5($forgetPass);
                $forgetPasswordSave = new UserDao();
                $forgetPasswordSave->updateForgetPassword($Password, $_SESSION["forget_email"]);
            }
        //}
        return new LoginView();
    }
}//class end