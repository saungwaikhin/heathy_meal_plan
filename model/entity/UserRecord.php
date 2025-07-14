<?php
class UserRecord{
	private $record_id;
	private $height_feet;
	private $height_inches;
	private $weight;
	private $bmi;
	private $user_id;
	private $updated_date;
	
	public function getId(){
		return $this->record_id;
	}
	public function setId($record_id){
		return $this->record_id=$record_id;
	}

	public function getHeightFeet(){
		return $this->height_feet;
	}
	public function setHeightFeet($height_feet){
		return $this->height_feet=$height_feet;
	}
	
	public function getHeightInches(){
		return $this->height_inches;
	}
	public function setHeightInches($height_inches){
		return $this->height_inches=$height_inches;
	}
	public function getWeight(){
		return $this->weight;
	}
	public function setWeight($weight){
		return $this->weight=$weight;
	}

	public function getBmi(){
		return $this->bmi;
	}
	public function setBmi($bmi){
		return $this->bmi=$bmi;
	}

	public function getUserId(){
		return $this->user_id;
	}
	public function setUserId($user_id){
		return $this->user_id=$user_id;
	}

	public function getUpdatedDate(){
		return $this->updated_date;
	}
	public function setUpdatedDate($updated_date){
		return $this->updated_date=date("Y-m-d");
		//return $this->updated_date=$updated_date;
	}
}