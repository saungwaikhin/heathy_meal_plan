<?php 
class PackageDao extends DAO{
	public function getPackageByName(){
		$package_name = $_POST["pName"];
		//echo $package_name;
		
		$sql = "select * from package where package_name=:packageName";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":packageName", $package_name);
		$result = $this->executeQuery();
		
		return $result;
	}
	
	
	public function savePackage(){
		$package = $_SESSION["package"];
    	
    	$sql = "insert into package (package_id, package_name, package_type, package_desc) values (null, :packagename, :packagetype, :packagedesc)";
    	
    	$this->openDB();
    	$this->prepareQuery($sql);
    	$this->bindQueryParam(":packagename", $package->getName());
    	$this->bindQueryParam(":packagetype", $package->getType());
    	$this->bindQueryParam(":packagedesc", $package->getDescription());
    	
    	$this->beginTrans();
    	$result = $this->executeUpdate();
    	
		if($result)
			$this->commitTrans();
		else 
			$this->rollbackTrans();	
		
		if(isset($_SESSION["package"]))
    		unset($_SESSION["package"]);
	}
	
	public function getAllPackage(){
		$sql="select * from package order by package_type asc";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	
	public function getPackageById($id){
		$package_id = $id;
		
		$sql = "select * from package where package_id=:id";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":id", $package_id);
		$result = $this->executeQuery();
		return $result;
		
	}
	
	public function updateSavePackage(){
		$package = $_SESSION["update_package"];
		
		$sql = "update package set package_name=:packageName, package_type=:packageType, package_desc=:packageDesc where package_id=:id";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":packageName", $package->getName());
		$this->bindQueryParam(":packageType", $package->getType());
		$this->bindQueryParam(":packageDesc", $package->getDescription());
		$this->bindQueryParam(":id", $package->getId());
		
		$this->beginTrans();
    	$result = $this->executeUpdate();
    	
		if($result)
			$this->commitTrans();
		else 
			$this->rollbackTrans();	
	}
	public function deletePackage(){
		$package= $_GET["id"];
		$sql="delete from package where package_id=:package_id";
		
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":package_id", $package);
		
		$this->beginTrans();
    	$result = $this->executeUpdate();
    	
		if($result)
			$this->commitTrans();
		else 
			$this->rollbackTrans();	
		
	}
	
 	public function getAllPackageByRows($start, $no_of_record){
        $sql = "select * from package limit $start,$no_of_record";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        
        return $result;
    }
    
	public function getAllPackageName(){
		$sql="select * from package order by package_type asc";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	public function getPackageByPackageType($choose_id){
		$sql="select package.package_type from package,choosepackage where package.package_id=choosepackage.package_id and choosepackage.choose_id=:id";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":id", $choose_id);
		$result=$this->executeQuery();
		//print_r($result);
		return $result[0]["package_type"];
	}
}