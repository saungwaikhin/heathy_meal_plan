<style>
.vertical-menu {
	width: 100%; //
	height: 150px;
	overflow-y: auto;
	font-weight: bold
}

.vertical-menu .icon {
	display: none;
}

.vertical-menu a { //
	background-color: #eee;
	color: #054f19;
	display: block;
	padding: 12px;
	text-decoration: none;
	border-bottom: 1px solid lavender;
}

.vertical-menu a:hover {
	background-color: #65AB3B;
	color: white;
}

.vertical-menu a.active { //
	background-color: #65AB3B;
	color: #65AB3B;
	border-bottom: 1px solid lavender;
	border-right: 15px solid #65AB3B;
}

.vertical-menu a.active:hover { //
	background-color: #65AB3B;
	color: white;
	border-bottom: 1px solid #65AB3B;
	border-right: 15px solid #65AB3B;
}

@media screen and (max-width: 600px) {
	.vertical-menu a {
		display: none;
		
		
	}
	.vertical-menu a.icon {
		float: left;
		display: block;
		position: absolute;
		right: 0;
		top: 0;
		z-index: 1;
		color:#fff;
		background-color: #65AB3B;
	}
	.vertical-menu a.active:hover {
		
		color:#000;
	}
}

@media screen and (max-width: 600px) {
	.vertical-menu.responsive {
		position: relative;
		clear:left;
	}
	.vertical-menu.responsive a.icon {
		position: absolute;
		right: 0;
		top: 0;
	}
	.vertical-menu.responsive a {
		float: none;
		display: block;
		text-align: left;
	}
}
</style>

<div
	class="vertical-menu" id="myTopnav">
	<a href="index.php?usecase=<?php echo UC_A_HOME?>" class="active"><i class="fa fa-home"></i> &emsp;Home</a>
	<a href="index.php?usecase=<?php echo UC_ADMIN_UPDATE_PROFILE?>"><i class="fas fa-user"></i> &emsp;Profile</a>
	<!-- <a href="#"><i
		class='far fa-calendar-alt'></i> &emsp;Daily Food</a>  -->
	 <a
		href="index.php?usecase=<?php echo UC_A_PACKAGE ?>"><i
		class='fas fa-box-open'></i> &emsp;Package</a>
		<a href="index.php?usecase=<?php echo UC_A_CAT ?>"> <i class='fas fa-list'></i> &emsp;Category</a>  <a
		href="index.php?usecase=<?php echo UC_A_FOOD ?>"> <i
		class='fas fa-drumstick-bite'></i> &emsp;Food</a> <a
		href="index.php?usecase=<?php echo UC_A_MEAL?>"><i
		class='fas fa-file-powerpoint'></i> &emsp;Meal Plan</a>
		<a href="index.php?usecase=<?php echo UC_A_RECORD_USER_LIST?>"><i
		class='fas fa-clipboard-list'></i> &emsp;User Record</a> 
		<a href="index.php?usecase=<?php echo UC_UC_LOGOUT?>"><i class="fa fa-history" style="font-size:17px"></i>&emsp;Log out</a> <a href="javascript:void(0);"
		style="font-size: 15px;" class="icon active" onclick="myFunction()"
		id="ic">&#9776;</a>
</div>

<script>
function myFunction() {

  var x = document.getElementById("myTopnav");
  if (x.className === "vertical-menu") {
    x.className += " responsive";
  } else {
    x.className = "vertical-menu";
  }
}
</script>
