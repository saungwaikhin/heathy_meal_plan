<?php
class MealPlanDao extends DAO{
    public function getAllMeal(){
    	$sql = "select * from mealplan";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$result = $this->executeQuery();
    	return $result;
    }
    
    public function getAllMealByRows($start, $no_of_record){
    	$sql = "select * from mealplan limit $start,$no_of_record";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        
        return $result;
    }
    
    public function saveMealPlan(){
        $meal = $_SESSION["meal"];
        //print_r($meal);
        $sql = "insert into mealplan (meal_id, meal_type, meal_time, food_id, meal_desc, meal_image) values (null, :mealtype, :mealtime, :fodid, :mealdesc, :mealimage)";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":mealtype", $meal->getMeal_type());
        $this->bindQueryParam(":mealtime", $meal->getMeal_time());
        $this->bindQueryParam(":fodid", $meal->getFood_id());
        $this->bindQueryParam(":mealdesc", $meal->getMeal_desc());
        $this->bindQueryParam(":mealimage", $meal->getMeal_image());
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
                
        if(isset($_SESSION["meal"]))
            unset($_SESSION["meal"]);
    }
public function getMealSearch($mealType, $mealTime, $foodId){
    	$sql = "select * from mealplan where meal_type=:mealtype and meal_time=:mealtime and  food_id=:foodId";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":mealtype", $mealType);
    	$this->bindQueryParam(":mealtime", $mealTime);
    	$this->bindQueryParam(":foodId", $foodId);
    	$result = $this->executeQuery();
    	return $result;
    }
    
    public function getMealById($meal_id){
        $sql = "select * from mealplan where meal_id=:id";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":id", $meal_id);
        $result = $this->executeQuery();
        return $result;
    }
    
    public function saveUpdateMealPlan(){
        $updmeal = $_SESSION["update_meal"];
        //print_r($updmeal);
        $sql = "update  mealplan set meal_type=:mealtype, meal_time=:mealtime, food_id=:fodid, meal_desc=:mealdesc, meal_image=:mealimage where meal_id=:mealid";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":mealtype", $updmeal->getMeal_type());
        $this->bindQueryParam(":mealtime", $updmeal->getMeal_time());
        $this->bindQueryParam(":fodid", $updmeal->getFood_id());
        $this->bindQueryParam(":mealdesc", $updmeal->getMeal_desc());
        $this->bindQueryParam(":mealimage", $updmeal->getMeal_image());
        $this->bindQueryParam(":mealid", $updmeal->getMeal_id());
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
            $this->commitTrans();
            else
                $this->rollbackTrans();
                
                if(isset($_SESSION["update_meal"]))
                    unset($_SESSION["update_meal"]);
    }
}