<?php
class FoodListDao extends DAO{
    public function getFoodbyFoodName($name){
        $food_name = $name;
        
        $sql = "select * from foodlist where food_name=:foodname";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":foodname", $food_name);
        $result = $this->executeQuery();
        
        return $result;
    }
    
    public function saveFood(){
        $food = $_SESSION["food"];
        
        $sql = "insert into foodlist (food_id, food_name, cat_id, food_desc) values (null, :foodname, :cat_id, :food_desc)";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":foodname", $food->getName());
        $this->bindQueryParam(":cat_id", $food->getCatId());
        $this->bindQueryParam(":food_desc", $food->getDescription());
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
        
        if(isset($_SESSION["food"]))
            unset($_SESSION["food"]);
    }
    
    public function getAllFood(){
        $sql = "select * from foodlist";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        
        return count($result);
    }
    public function getAllFoodList(){
        $sql = "select * from foodlist order by food_name asc";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        
        return $result;
    }
    public function getFoodByFoodId($foodId){
        $food_id = $foodId;
        
        $sql = "select * from foodlist where food_id=:food_id";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":food_id", $food_id);
        $result = $this->executeQuery();
        
        return $result;
    }
    
    public function updateSaveFood(){
    	$update_food = $_SESSION["update_food"];
    	//print_r($update_food);
    	
    	$sql ="update foodlist set food_name=:food_name, cat_id=:cat_id, food_desc=:food_desc where food_id=:id";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":food_name", $update_food->getName());
    	$this->bindQueryParam(":cat_id", $update_food->getCatId());
        $this->bindQueryParam(":food_desc", $update_food->getDescription());
        $this->bindQueryParam(":id", $update_food->getId());
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
        	$this->commitTrans();
        else 
        	$this->rollbackTrans();
        	
        if(isset($_SESSION["update_food"]))
        	unset($_SESSION["update_food"]);
        	
    }
    
    public function deleteFood(){
    	$food_id = $_GET["id"];
    	
    	$sql = "delete from foodlist where food_id=:food_id";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":food_id", $food_id);
    	
    	$this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
        	$this->commitTrans();
        else 
        	$this->rollbackTrans();
    	
    }
    
    public function getAllFoodByRows($start, $no_of_record){
        $sql = "select * from foodlist limit $start,$no_of_record";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        
        return $result;
    }
}