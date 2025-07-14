<?php
class WelcomeController{
    public function renderWelcome(){
    	if(isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"]))
			unset($_SESSION["loginUser"]);
			unset($_SESSION["loginAdmin"]);
			session_destroy();
        return new WelcomeView();
    }
}