<?php

class AdminUserRecordBMIView extends View
{

    private $errors;

    private $allrecord;

    // private $no_of_all_bmirecords;
    private $start_from;

    public function __construct($allrecord, $errors = null)
    {
        $this->allrecord = $allrecord;
        // $this->no_of_all_bmirecords=$no_of_all_bmirecords;
        $this->errors = $errors;
        // $this->start_from=$start_from;
    }

    public function displayBody()
    {
        ?>
<div class="container">
	<?php include 'view/inc/user_menu_admin.php'; ?>
	<form method="post">

		<p class="pagehead">
		<?php echo $_SESSION["adminViewUserName"];?>
			's BMI result
		</p>
<?php if(!empty($this->allrecord)){?>
		<table class="table  table-bordered table-hover"
			style="text-align: center;">
			<tr style="color: #a7d433; ">
				<th>No.</th>
				<th>Date</th>
				<th>Height Feet</th>
				<th>Height Inches</th>
				<th>Weight</th>
				<th>BMI</th>
				<th>Result</th>


			</tr>
			<?php
        //print_r($this->allrecord);
       
        foreach ($this->allrecord as $key => $record) {
            // print_r($record);
            ?>
			<tr>
				<td align="right"><?php echo ++$this->start_from;?></td>
				<td><?php echo $record["updated_date"]?></td>
				<td><?php echo $record["height_feet"]?></td>

				<td><?php echo $record["height_inches"]?></td>

				<td><?php echo $record["weight"]?></td>

				<td><?php echo $record["bmi"]?></td>

				<td><?php
            if ($record["bmi"] < 18.5)
                echo "Underweight";
            elseif (18.5 <= $record["bmi"] && $record["bmi"] < 24.9)
                echo "Normal Weight";
            elseif (25 <= $record["bmi"] && $record["bmi"] < 29.9)
                echo "Overweight";
            
            elseif (30 <= $record["bmi"] && $record["bmi"] < 34.9)
                echo "Obseity(Class 1)";
            
            elseif (35 <= $record["bmi"] && $record["bmi"] < 39.9)
                echo "Obseity(Class 2)";
            
            elseif ($record["bmi"] > 40)
                echo "Extreme Obesity";
            ?>
				</td>






			</tr>
			<?php
            if (isset($this->errors["all_null"]))
                echo $this->errors["all_null"];
        }
        ?>
		</table>


		<div>
			<input type="submit" name="btnUserRecordBack" value="Back"
				class="btn btn-outline-success">
		</div>
	</form>
	<?php }else{?>
	<div class="row">
	<div class="col page_center"><p><i class='fas fa-info-circle' style="font-size:48px;color:green;"></i></p>
		<p>No BMI result for this user.</p>
		<form method="post">
		<input type="submit" name="btnUserRecordBack" value="Back"
				class="btn btn-outline-success">
	</form>
	</div>
</div>
	<?php }?>
</div>


<?php
    
}
}
?>