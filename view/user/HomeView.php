<?php
class HomeView extends View {
	private $weightbmi;
	private $allpackage;
	private $packageImg;
	private $choosepackage;
	private $packageid;
	private $finish_date;
	public function __construct($weightbmi=null,$allpackage=null,$packageid=null,$choosepackage=null,$finish_date=null){
		$this->weightbmi=$weightbmi;
		$this->allpackage=$allpackage;
		$this->packageid=$packageid;
		$this->choosepackage=$choosepackage;
		$this->finish_date=$finish_date;
	}
	public function displayBody(){
		$choosedao=new ChoosePackageDao();
		$finishdate=$choosedao->getFinishDate();
			
		$userDao = new UserDao();
			$bmiResult = $userDao->getBmitHere();
			foreach ($bmiResult as $key=>$value){
				$weightbmi = $value["bmi_result"];
				
			?>

<div class="content">
	<?php if($weightbmi==NULL || $weightbmi==0) {?>      
     <div class="row">          
            <div class="col-sm-4 text-center">
                <div class="under_bmi">
                    <h3 style="color:#33c7e3">Under Weight</h3>
                    <img alt="under weight" src="./images/under.png" height="200px">
                    <p style="margin-top: 20px;">
                    	<a href="index.php?usecase=<?php echo UC_UPDATE_RECORD ?>" class="btn-under">
       							Please Fill Your Height and Weight</a>
					</p>
                </div>
            </div>

            <div class="col-sm-4 text-center">
                <div class="normal_bmi">
                    <h3 style="color:#33e56d">Normal Weight</h3>
                    <img alt="under weight" src="./images/normal.png" height="200px">
                    <p style="margin-top: 20px;">
                    	<a href="index.php?usecase=<?php echo UC_UPDATE_RECORD ?>" class="btn-normal">
       							Please Fill Your Height and Weight</a>
					</p>
                </div>
            </div>

            <div class="col-sm-4 text-center">
            	<div class="over_bmi">
            		<h3 style="color:#f85931">Over Weight</h3>
            		<img alt="under weight" src="./images/over_weight.png" height="200px">
           			<p style="margin-top: 20px;">
                    	<a href="index.php?usecase=<?php echo UC_UPDATE_RECORD ?>" class="btn-over">
       							Please Fill Your Height and Weight</a>
					</p>
                </div>
            </div>
       </div> <!-- Null Resulr -->
			
	<?php }
	else { ?>
		<div class="row">          
            <div class="col-sm-4 text-center">
                <div class="under_bmi">
                    <h3 style="color:#33c7e3">Under Weight</h3>
                    <img alt="under weight" src="./images/under.png" height="200px">
                    <?php
						if ($weightbmi<18.5){
	                        echo "<p style='color:#33c7e3'><b>Your are Here!</b></p>
							<p>
								Your BMI is <b> $weightbmi </b>
							</p>";
						}
                    ?>
                </div>
            </div>

            <div class="col-sm-4 text-center">
                <div class="normal_bmi">
                    <h3 style="color:#33e56d">Normal Weight</h3>
                    <img alt="under weight" src="./images/normal.png" height="200px">
                    <?php
						if($weightbmi>=18.5 && $weightbmi<=25){
	                        echo "<p style='color:#33e56d'><b>Your are Here!</b></p>
							<p>
								Your BMI is <b> $weightbmi </b> 
							</p>";
	                    }                  
                    ?>
                </div>
            </div>

            <div class="col-sm-4 text-center">
	            <div class="over_bmi">
		            <h3 style="color:#f85931">Over Weight</h3>
		            <img alt="under weight" src="./images/over_weight.png" height="200px">
		            <?php
		            	if($weightbmi>25) {
			                echo "<p style='color:#f85931'><b>Your are Here!</b></p>
								<p>
									Your BMI is <b> $weightbmi </b> 
								</p>";
		            	}
		            	?>
				 </div>
        	</div>
		</div>
    <?php } ?>
	<!-- Here -->

	<h2 class="text-center">Please Choose Your Package</h2>
	<div class="row">
	<?php
	$packagedao=new PackageDao();
	$allPackage=$packagedao->getAllPackage();
	
	foreach ($allPackage as $key=>$value){
		// print_r($value);
		++$this->packageImg;
		?>
	
		<div class="col-sm-3" style="float: left;">
			<a
				href="index.php?usecase=<?php echo UC_CHOOSE_PACKAGE ?>&packageid=<?php echo $value["package_id"]?>"
				> <img
				src="<?php $picturePath="./images/package_0".$this->packageImg.".jpg"; echo $picturePath?>"
				width=100%> </a>
			<div style="color: bold; font-size: 20px; text-align: center;">
			<?php echo $value["package_name"];?>
			</div>
		</div>
		
		<?php } ?>
	</div>
</div><!-- content -->
<br>
		<?php
		}
	}
 }