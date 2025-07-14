<?php
class AdminHomeView extends View
{
	private $peoplecount;
	public function __construct($peoplecount=null){
		$this->peoplecount=$peoplecount;
	}
    public function displayBody()
    {	$userdao=new UserDao();
    	$allusercount=$userdao->getAllCount();
    	$activeusercount=$userdao->getActiveCount();
		$underweight=$userdao->getUnderCount();
		$normalweight=$userdao->getNormalCount();
		$overweight=$userdao->getOverCount();
        ?>


        <div class="content">
			
			
			
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="under_bmi">
                        <h3 style="color:#33c7e3">Under Weight</h3>
                        <img alt="under weight" src="./images/under.png" height="200px">
                        <p style="margin-top: 20px;">
                        <?php
                            echo "Under weight total users are &nbsp; <b>".$underweight."</b>";
                        ?>
                      	<p>
                    </div>
                </div>

                <div class="col-sm-4 text-center">
                    <div class="normal_bmi">
                        <h3 style="color:#33e56d">Normal Weight</h3>
                        <img alt="under weight" src="./images/normal.png" height="200px">
                        <p style="margin-top: 20px;">
	                    <?php
							echo " Normal weight total users are &nbsp; <b>".$normalweight."</b>";
						?>
						</p>
                    </div>
                </div>

                <div class="col-sm-4 text-center">
                    <div class="over_bmi">
                        <h3 style="color:#f85931">Over Weight</h3>
                        <img alt="under weight" src="./images/over_weight.png" height="200px">
                        <p style="margin-top: 20px;">
                        <?php
                              echo "Over weight total users are &nbsp; <b>".$overweight."</b>";
                        ?>
                        </p>
                    </div>
                </div>

            </div><!-- Here -->

			<div class="row border border-secondary rounded" style="margin: 50px 5px;">
				<div class="col-sm-6 text-center" style="border-right: 1px solid #6C757D;">
					<p style="padding-top: 10px; font-weight:bold;;">
						<?php echo "Total users are &nbsp; <b>".$allusercount."</b>";?>
					</p>
				</div>
				<div class="col-sm-6 text-center">
					<p style="padding-top: 10px; font-weight:bold;;">
						<?php echo "Active users are &nbsp; <b>".$activeusercount."</b>";?>
					</p>
				</div>
			</div>
			<br>

        </div>
        <?php
    }
}