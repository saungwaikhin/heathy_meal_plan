<?php
class DailyFoodPlanDao extends DAO{
    
    public function saveDailyFoodPlanByPackageId($day,$chooseId,$mealId){
        $sql="INSERT INTO dailyfoodplan (daily_id,days,choose_id,status,meal_id)VALUES(null,:day,:choose_id,0,:meal_id)";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":day", $day);
        $this->bindQueryParam(":choose_id", $chooseId);
        $this->bindQueryParam(":meal_id", $mealId);
        $this->beginTrans();
        $result=$this->executeUpdate();
        if($result)$this->commitTrans();
        else $this->rollbackTrans();
    }
    public function getMealIdByMealTime($mealTimeTable){
        $sql="";
        $mysql_tb="".$mealTimeTable;
        
        $sql="select * from ".$mysql_tb;
        $this->openDB();
        $this->prepareQuery($sql);
        //$this->bindQueryParam(":mealTimeTable", $mealTimeTable);
        $result=$this->executeQuery();
        return $result;
    }
    public function checkDailyFoodPlanByChooseIdandDay($chooseId,$day){
        $sql="select * from dailyfoodplan where choose_id=:chooseId and days=:day";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":chooseId", $chooseId);
        $this->bindQueryParam(":day", $day);
        $result=$this->executeQuery();
        if($result)return TRUE;
        else return FALSE;
    }
    public function getDailyFoodPlanByChooseIdandDay($chooseId,$day){
        //$sql="select * from dailyfoodplan where choose_id=:chooseId and days=:day";
        $sql="SELECT dailyfoodplan.daily_id,dailyfoodplan.days,dailyfoodplan.choose_id,dailyfoodplan.status,dailyfoodplan.meal_id,mealplan.meal_type,mealplan.meal_time,mealplan.meal_desc,mealplan.meal_image,mealplan.food_id,foodlist.food_name,foodlist.food_desc FROM ((dailyfoodplan INNER JOIN  mealplan ON mealplan.meal_id=dailyfoodplan.meal_id)INNER JOIN foodlist ON foodlist.food_id=mealplan.food_id) WHERE dailyfoodplan.days=:day and choose_id=:chooseId";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":chooseId", $chooseId);
        $this->bindQueryParam(":day", $day);
        $result=$this->executeQuery();
        return $result;
        
    }
    public function getDailyFoodPlanByChooseId($chooseId){
        //$sql="select * from dailyfoodplan where choose_id=:chooseId and days=:day";
        $sql="SELECT dailyfoodplan.daily_id,dailyfoodplan.days,dailyfoodplan.choose_id,dailyfoodplan.status,dailyfoodplan.meal_id,mealplan.meal_type,mealplan.meal_time,mealplan.meal_desc,mealplan.meal_image,mealplan.food_id,foodlist.food_name,foodlist.food_desc FROM ((dailyfoodplan INNER JOIN  mealplan ON mealplan.meal_id=dailyfoodplan.meal_id)INNER JOIN foodlist ON foodlist.food_id=mealplan.food_id) WHERE choose_id=:chooseId";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":chooseId", $chooseId);
        //$this->bindQueryParam(":day", $day);
        $result=$this->executeQuery();
        return $result;
        
    }
    public function updateDailyFoodPlanStatus($dailyId){
        $sql="update dailyfoodplan set status=1 where daily_id=:dailyId";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":dailyId", $dailyId);

        $this->beginTrans();
        $result=$this->executeUpdate();
        if($result)$this->commitTrans();
        else $this->rollbackTrans();
    }
public function getAllDailyFood($id){
		
		//echo $choosePackage_id;
		$sql = "select * from dailyfoodplan where choose_id=$id ";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		
		return $result;
	}
	
	public function getAllDailyStatus($status){
		$sql = "select * from dailyfoodplan where status=$status ";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		
		return $result;
	}
//for admin User Record Daily food
	public function getUserDailyFood(){
	   
	      // echo "user id view by admin is".$_SESSION["admin_view_user_id"];
		$sql = "select dailyfoodplan.days,mealplan.meal_type,mealplan.meal_desc, dailyfoodplan.daily_id from dailyfoodplan,choosepackage,mealplan where dailyfoodplan.choose_id=choosepackage.choose_id and dailyfoodplan.meal_id=mealplan.meal_id and choosepackage.user_id=:userid";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":userid",$_SESSION["adminViewUserId"]);
		$result=$this->executeQuery();
		//$row_cnt = $result->num_rows;
		//printf("Result set has %d rows.\n", $row_cnt);
		return ($result);
		
	}
public function getUserDailyFoodDetail(){
    $_SESSION["day"]=$_GET["day"];
    //echo "day is".$_SESSION["day"];

		$sql = "select * from dailyfoodplan,choosepackage,mealplan,foodlist where dailyfoodplan.choose_id=choosepackage.choose_id and dailyfoodplan.meal_id=mealplan.meal_id and mealplan.food_id=foodlist.food_id and choosepackage.user_id=:userid and dailyfoodplan.days=:day";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":userid",$_SESSION["adminViewUserId"]);
		$this->bindQueryParam(":day", $_SESSION["day"]);
		$result=$this->executeQuery();
		
		return $result;
	}
}