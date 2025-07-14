<?php

class RecordUpdateController
{

	private $result;

	public function renderUserUpdate()
	{
		$recordDao = new RecordDao();
		$result = $recordDao->getRecordByUserId();
		return new RecordUpdateEditView("", $result);
	}

	public function renderUserUpdateCancel()
	{
		$recordDao = new RecordDao();
		$result = $recordDao->getRecordByUserId();
		return new RecordUpdateEditView("", $result);
	}

	public function renderRecordSave()
	{
		$recordao = new RecordDao();
		$recordao->saveRecord();
		return new RecordUpdateSaveView();
	}

	public function renderRecordConfirm()
	{
		$userId = $_SESSION["loginUser"][0]['user_id'];
		$feet = @$_POST["feet"];
		$inches = @$_POST["inches"];
		$weight = @$_POST["weight"];
		// $bmi=@$_POST["bmi"];

		if ($feet == "" && $inches == "" && $weight == "")
		$errors["all_null"] = "Please Enter all required fields.";

		else {
			if ($feet == "")
			$errors["feet_null"] = "Please Enter Your Height(feet)";


			if($inches > 11)
			$errors["inches_null"]="Please Enter Your Height(inches) less than 12 inches";
			 

			if ($weight == "")
			$errors["weight_null"] = "Please Enter weight";
		}

		if (! empty($errors)) {
			$recordDao = new RecordDao();
			$result = $recordDao->getRecordByUserId();
			return new RecordUpdateEditView($errors, $result);
		}
		if (empty($errors)) {

			$bmiresult = $this->calculateBmiUpdate($feet, $inches, $weight);

			$record = new UserRecord();
			// $record->setUserId($userId);
			$record->setHeightFeet($feet);
			$record->setHeightInches($inches);
			$record->setWeight($weight);
			$record->setBmi($bmiresult);
			$_SESSION["record_user"] = $record;
			// print_r($_SESSION["record_user"]);
			return new RecordUpdateConfirmView();
		}
	}

	public function calculateBmiUpdate($feet, $inches, $weight)
	{   //
		$intinches = $inches;
		if ($inches == "") {
			$intinches = 0;
		}
		if ($weight > 0 && $feet > 0 && $intinches > - 1) {
			$ftoi = $feet * 12;
			$height = $ftoi + $intinches;
			// calculate bmi
			$finalbmical = ($weight * 703) / ($height * $height);
			$finalBmi = number_format($finalbmical, 2);
			if ($finalBmi < 18.5) {
				$this->result = "Under weight";
			} elseif ($finalBmi <= 25) {
				$this->result = "Normal";
			} elseif ($finalBmi <= 30) {
				$this->result = "Over weight";
			} elseif ($finalBmi <= 40) {
				$this->result = "Obese";
			} else {
				$this->result = "Extremely obese";
			}

			if (isset($_SESSION["record_id"])) {
				$record = $_SESSION["record_id"];
			}
			return $finalBmi;
		}
	}
}
