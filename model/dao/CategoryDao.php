<?php
class CategoryDao extends DAO{
    public function getCatByCatName(){
    	$catname = $_POST["catName"];
    	
    	$sql = "select * from foodcategory where cat_name=:catname";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":catname", $catname);
    	$result = $this->executeQuery();
    	return $result;
    }
    
    public function saveCategory(){
    	$category = $_SESSION["category"];
    	
    	$sql = "insert into foodcategory (cat_id, cat_name) values (null, :catname)";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":catname", $category->getName());
    	
    	$this->beginTrans();
    	$result = $this->executeUpdate();
    	
    	if($result)
    		$this->commitTrans();
    	else 
    		$this->rollbackTrans();
    		
    	if(isset($_SESSION["category"]))
    		unset($_SESSION["category"]);
    }
    public function getAllCategory(){
    	$sql = "select * from foodcategory";
    	
   		$this->openDB();
    	$this->prepareQuery($sql);
    	$result = $this->executeQuery();
    	return $result;
    }
    
    public function getCatById($id){
    	$sql = "select * from foodcategory where cat_id=$id";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$result = $this->executeQuery();
    	return $result;
    }
    
    public function updateSaveCategory(){
    	$update_cat = $_SESSION["update_category"];
    	
    	$sql ="update foodcategory set cat_name=:cat_name where cat_id=:id";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":cat_name", $update_cat->getName());
        $this->bindQueryParam(":id", $update_cat->getId());
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
        	$this->commitTrans();
        else 
        	$this->rollbackTrans();
        	
        if(isset($_SESSION["update_category"]))
        	unset($_SESSION["update_category"]);
    }
    
    public function getAllCatByRows($start, $no_of_record){
    	$sql = "select * from foodcategory limit $start,$no_of_record";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        
        return $result;
    }
}