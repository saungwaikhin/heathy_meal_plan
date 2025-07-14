<?php

class RecordUpdateEditView extends View
{
	private $errors;
	private $allRecords;
	public function __construct($errors,$allRecords){
		$this->errors = $errors;
		$this->allRecords=$allRecords;
	}
    public function displayBody()
    {?>


<link rel="stylesheet" type="text/css" media="all"
	href="./css/record.css" />
		<!-- content header -->

<div class="container">
	<div class="row">

		<div class=col-md-4>
			<div class="row">
	<div class="col ">
		<p class="pagehead">Update your current information</p>
	</div>
</div>
			<form method="post" name="bmiForm">
			<div class="calc">
				<div class="form-group">
					Height: <input type="text" name="feet" maxlength="1" size="7"
						value="<?php 
					if(isset($_SESSION["record_user"]))
						echo $_SESSION["record_user"]->getHeightFeet();
						else	
						echo @$_POST["feet"];
					?>"> feets 
					
					<input type="text" name="inches" maxlength="2" size="7"
						value="<?php 
					if(isset($_SESSION["record_user"]))
						echo $_SESSION["record_user"]->getHeightInches();
						else	
						echo @$_POST["inches"];
					?>"> inches
			
				</div>
				<div class="form-group">
				<font color="red">
				<?php if (isset($this->errors["feet_null"]))
				echo $this->errors["feet_null"];
				?>
				<?php if (isset($this->errors["inches_null"]))
				echo $this->errors["inches_null"];
				?></font>
				</div>
				<div class="form-group">
					 Weight:<input type="text" maxlength="4" name="weight"
						size="20"
						value="<?php 
						if(isset($_SESSION["record_user"]))
						echo $_SESSION["record_user"]->getWeight();
						else	
						echo @$_POST["weight"];
					?>">lbs
				</div>
				<div class="form-group">
					<input type="submit" value="Update" name="btnUpdateRecord"
						class="btn btn-outline-success"> <input type="submit"
						value="Cancel" name="btnHome" class="btn btn-outline-success">
				</div>
				<div class="form-group">
				<font color="red">
				<?php if (isset($this->errors["weight_null"]))
				echo $this->errors["weight_null"];
				?>
				<?php if (isset($this->errors["all_null"]))
				echo $this->errors["all_null"];
				?>
				</font>

				</div>
				</div>
			</form>
		</div>
		<div class=col-md-4>
			<p class="pagehead" style="text-align:center;">BMI Formula</p>
			
			<div class="bmi"> BMI = 703 × weight (lbs) / [height (in)]2 </div>
		</div>

		<div class=col-md-4>
			<p class="pagehead" style="text-align:center;">BMI Categories</p>
			<div class="bmi-cate">
			<div>BMI &lt 18.5 =>Underweight</div>
			<div>18.5&lt BMI &lt24.9 =>Normal Weight</div>
			<div>BMI &gt25 =>Overweight</div>
			</div>
		</div>	
	</div>
	</div>
	<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Your BMI information</p>
	</div>
</div>
<form method="post">
		
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Updated Date:</th>
				<th>Height (feet')(inches")</th>
				
				<th>Weight</th>
				<th>BMI</th>
				<th>Result</th>
			</tr>
			<?php
			$count=0;
	foreach ($this->allRecords as $key=>$record){?>
		<tr>
			<td><?php echo ++$count; ?></td>
			<td><?php echo $record["updated_date"]; ?></td>
			<td><?php echo $record["height_feet"]."&#146;";echo $record["height_inches"]."&#148;";?></td>
		
			<td><?php echo $record["weight"];?></td>
			<td><?php echo $record["bmi"];?></td>
			<td><?php if($record["bmi"]<18.5)echo "UnderWeight";
						elseif($record["bmi"]<=25) echo "Normal Weight";
						else echo "OverWeight";?>
			</td>
		</tr>
	<?php }?>
</table>
</form>

<?php }
}