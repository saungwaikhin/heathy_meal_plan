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

.horizone-menu a { //
	background-color: #eee;
	color: #054f19;
	display: block;
	padding: 12px;
	text-decoration: none;
	border-bottom: 1px solid lavender;
}

.horizone-menu a:hover {
	background-color: #65AB3B;
	color: white;
	text-decoration:none;
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




</style>

<div class="w3-bar w3-green horizone-menu">
	<a class="w3-bar-item w3-button w3-cyan " style="width: 50%"
		href="index.php?usecase=<?php echo UC_A_PACKAGE_USER?>"><i
		class='fa fa-history'></i> &emsp;Package History</a> <a
		class="w3-bar-item w3-button w3-purple" style="width: 50%;"
		href="index.php?usecase=<?php echo UC_A_RECORD_USER_BMI ?>"> <i
		class='fas fa-weight'></i> &emsp;BMI Result
	</a>
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
