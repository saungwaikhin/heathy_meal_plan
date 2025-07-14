<?php

abstract class View
{

    private function displayHeader()
    {
        ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<title>HealthyMealPlan</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/base.css"title="Default Styles" media="screen">
<link rel="stylesheet" href="css/w3.css">


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap"
	rel="stylesheet"> -->

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/a076d05399.js"></script>


</head>
<body>
	<div class="container-fluid">
<?php
        if (isset($_SESSION["loginUser"])) {
            ?>
	
		<div class="row" style="background-color: #e8f5e9;">
			<div class="col float-left logo">
			<?php if(@$_SESSION["loginUser"][0]["role"]==0){?>
				<a href="index.php?usecase=<?php echo UC_HOME ?>">
					<img src="./images/logo.png" width=150px alt="logo" style="box-shadow:5px;"/>
				</a>
				<?php }else{?>
				<a href="index.php?usecase=<?php echo UC_A_HOME ?>">
					<img src="./images/logo.png" width=150px alt="logo" style="box-shadow:5px;"/>
				</a>
				<?php }?>
			</div>
			<div class="col-sm-3" style="padding-top: 20px;color: #059c2d;text-shadow: 2px 2px 4px #06d13c;font-weight:bold;"><p> <i class='fas fa-user-circle' style='font-size:25px;color:#059c2d'></i>&emsp; <?php echo $_SESSION["loginUser"][0]["name"]?></p></div>
			<!-- <div style="right: 5px; top: 15px; position: absolute;">
				<a href="index.php?usecase=<?php echo UC_LOGOUT ?>"
					class="btn btn-outline-success btn-sm" role="button" style="font-weight: bold">

           Log out
        </a>
			</div> -->
		</div>
		<!-- header -->

		<div class="row">

			<div class="col-sm-2 " style="padding-left: 50px; padding-right: 0;">
			<?php
            if (@$_SESSION["loginUser"][0]["role"]==0)
                include 'inc/left_menu.php';
            else
                include 'inc/left_menu_admin.php';
            ?>

			</div>


			<div class="col-sm-10 bg-light" style="">


			<?php
        } else {
            
            ?>
				
				<div class="row" style="background-color: #e8f5e9;">
					<div class="col-sm-6 float-left logo">
						<a href="index.php?usecase=<?php echo UC_WELCOME ?>">
							<img src="./images/logo.png" width=150px alt="logo" />
						</a>
					</div>
					<div class="col-sm-2" style="margin-top: 20px;padding:0px;">
						<a href="#what" class="welcome_link">What does Healthy mean?</a>
					</div>
					<div class="col-sm-1" style="margin-top: 20px;padding:0px;">
						<a href="#package" class="welcome_link">Packages</a>
					</div>
					<div class="col-sm-1" style="margin-top: 20px;padding:0px;">
						<a href="#plan" class="welcome_link">The Plans</a>
					</div>
					<div class="col-sm-1" style="margin-top: 20px;padding:0px;">
						<a href="#contact" class="welcome_link">Contact Us</a>
					</div>
				</div>
				<?php
        }
    }

    abstract protected function displayBody();

    private function displayFooter()
    {
        ?>
	</div>
		</div>
		<!-- footer -->
		<div class="container-fluid">
			<div class="row"  style="color:#5B8205;padding: 20px 0;border-top: 1px solid gray;">
				<div class="col-sm-6">
					Copyright&copy;2019 Team II
					
				</div>
				<div class="col-sm-6 text-right">
					Created by ICTTI (Advanced Web Development)
				</div>
			</div>
		</div>
		<!-- footer -->

	</div>
</body>
</html>
<?php
    }

    public function display()
    {
        $this->displayHeader();
        $this->displayBody();
        $this->displayFooter();
    }
}