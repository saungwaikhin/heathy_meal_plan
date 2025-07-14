<?php
class WelcomeView extends View
{

    public function displayBody()
    {
        ?>
<div class="row welcome_hero" >

	<div class="col-sm-2"></div>
	<div class="col-sm-4 welcome_div">
		<h2>Healthier Choices</h2>
		<h2>a Healthier You.</h2>
		<p class="welcome_txt">Our curriculum is based in cutting edge psychology, brain science,
			nutrition, intuitive.</p>
		<a href="index.php?usecase=<?php echo UC_LOGIN ?>" class="click_btn">Login</a>
		<a href="index.php?usecase=<?php echo UC_REG ?>" class="click_btn">Register</a>
	</div>
	<div class="col-sm-6"></div>
</div>

<!-- Welcome div -->



<div id="what" class="row" style="padding: 40px 0;">
	<div class="col-sm-3"></div>
	<div class="col-sm-6 text-center">
		<h2 style="margin-bottom: 50px;">What does Healthy mean?</h2>
		<p class="welcome_txt">At Healthy Meal Plans, we understand that ‘healthy’ actually
			means something different to everyone so we’ve worked tirelessly to
			ensure that this site offers options no matter what your taste,
			various meal plan, or dietary preferences are.</p>
	</div>
	<div class="col-sm-3"></div>
</div>
<!-- What -->


<div id="package" class="row">
	<div class="col-sm-3 text-center text-white"
		style="background-color: #FFA544; padding: 100px 0;">
		<h3 style="margin-bottom: 20px;">7 days Package</h3>
		<a style="font-size: 18px;" href="index.php?usecase=<?php echo UC_REG ?>" class="text-white">Learn More</a>
	</div>

	<div class="col-sm-3 text-center text-white"
		style="background-color: #A7D433; padding: 100px 0;">
		<h3 style="margin-bottom: 20px;">10 days Package</h3>
		<a style="font-size: 18px;" href="index.php?usecase=<?php echo UC_REG ?>" class="text-white">Learn More</a>
	</div>

	<div class="col-sm-3 text-center text-white"
		style="background-color: #FE8543; padding: 100px 0;">
		<h3 style="margin-bottom: 20px;">14 days Package</h3>
		<a style="font-size: 18px;" href="index.php?usecase=<?php echo UC_REG ?>" class="text-white">Learn More</a>
	</div>
	
	<div class="col-sm-3 text-center text-white"
		style="background-color: #2eb8b8; padding: 100px 0;">
		<h3 style="margin-bottom: 20px;">30 days Package</h3>
		<a style="font-size: 18px;" href="index.php?usecase=<?php echo UC_REG ?>" class="text-white">Learn More</a>
	</div>
	
</div>
<!-- Package -->


<div id="plan" class="row about_banner" style="padding: 30px 0;">

	<div class="col-sm-4"></div>
	<div class="col-sm-4 text-center">
		<h2 style="margin: 60px 0 35px;">The Plans</h2>
		<p>Our plans are designed to fit your needs. We have plans for women and men, 
		plus plans for people who need extra food.<br /><br />
		The weekly dinner planner is filled with delicious, healthy recipes that are easy to make 
		and can be scaled up or down to suit your family or to make leftovers for lunch.<br /><br />
		The plans offer a healthy variety of meals but they are also flexible and 
		empower you to swap out meals to suit your taste.</p>
	</div>
	<div class="col-sm-4"></div>
</div>
<!-- About Us -->

<div id="contact" class="row" style="padding: 50px 0 30px;background-color: #FFA544;">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 text-center">
		<h2 style="margin-bottom: 35px;color:#434343;">Contact Us</h2>
		<p>
			<img src="images/phone.png" width="24" height="24">
			<a href="tel:+951652529" class="welcome_txt">+95-1-652529</a>,
			<a href="tel:+951661714" class="welcome_txt">+95-1-661714</a>
		</p>
		<p>
			<img src="images/mail.png" width="34" height="30">
			<a href="mailto:healthymealplan.ictti@gmail.com" class="welcome_txt">healthymealplan.ictti@gmail.com </a>
		</p>
		<p>
			<img src="images/map.png" width="28" height="28">
			<a href="https://www.google.com/maps?ll=16.853998,96.135639&z=16&t=m&hl=en&gl=MM&mapclient=embed&cid=11040019640266572331" 
			class="welcome_txt" target="_blank">
				University of Hlaing Campus,Ward 12,Parami Road, Hlaing Township, Yangon,Myanmar
			</a>
		</p>
		<br />
		<p>
			<a href="https://www.facebook.com/Healthy-Meal-Plan-113243353413028/?modal=admin_todo_tour" target="_blank">
				<img src="images/facebook.png" width="36" height="36">
			</a>
			&ensp;&ensp;
			<a href="https://www.facebook.com/Healthy-Meal-Plan-113243353413028/?modal=admin_todo_tour" target="_blank">
				<img src="images/instagram.png" width="38" height="38">
			</a>
		</p>
	</div>
	<div class="col-sm-4"></div>
</div>
<!-- Contact -->
<button onclick="topFunction()" id="myBtn" title="Go to top">
	<img alt="" src="images/up-arrow.png" width="24" height="24">
</button>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<?php
    }
}