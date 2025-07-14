<?php

abstract class ViewLogin
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
<link rel="stylesheet" href="css/base.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link
	href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap"
	rel="stylesheet">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/a076d05399.js"></script>

<!--  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="container-fluid">
<?php
        
				
        
    }

    abstract protected function displayBody();

    private function displayFooter()
    {?>

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