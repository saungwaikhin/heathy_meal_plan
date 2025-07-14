<?php
class ChoosePackageDao extends DAO{
	public function saveChoosePackage(){
		$userId=$_SESSION["loginUser"][0]['user_id'];
		$packageid=$_GET["packageid"];

		$sql="insert into choosepackage (choose_id, package_id, user_id, start_date,finish_date) values(null,:packageid, :userid,null,null)";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":packageid", $packageid);
		$this->bindQueryParam(":userid", $userId);


		$this->beginTrans();
		$result = $this->executeUpdate();

		if($result)
		$this->commitTrans();
		else
		$this->rollbackTrans();

	}

	public function getFinishDate(){
		$userId=$_SESSION["loginUser"][0]['user_id'];
		//echo "User ID=".$userId;
		$sql="select * from choosepackage where user_id=:user_id order by finish_date desc limit 1";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":user_id", $userId);
		$result=$this->executeQuery();
		return $result;
	}
	public function getNullDate(){
		$userId=$_SESSION["loginUser"][0]['user_id'];
		//echo "User ID=".$userId;
		$sql="select * from choosepackage where user_id=:user_id and start_date is NULL";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":user_id", $userId);
		//$this->bindQueryParam(":null", "");
		$result=$this->executeQuery();
		return $result;
	}

	public function savePackage($chooseid,$startDate,$finishDate){
		//$user =$_SESSION["loginUser"];
		

		$sql="update choosepackage set start_date=:startdate, finish_date=:finishdate where choose_id=:chooseid";


		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":startdate", $startDate);
		$this->bindQueryParam(":finishdate", $finishDate);
		$this->bindQueryParam(":chooseid", $chooseid);

		$this->beginTrans();
		$result=$this->executeUpdate();
echo "Eff row".$result;
		if($result)
		$this->commitTrans();
		else
		$this->rollbackTrans();
	}

	public function getAllPackageHistoryByRows($start,$no_of_record){

		$sql="SELECT * FROM choosepackage LIMIT $start,$no_of_record";

		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	public function getAllPackageHistoryById(){
		$user_id=$_SESSION["loginUser"][0]['user_id'];
		$sql="select * from choosepackage where user_id=:user_id";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":user_id", $user_id);
		$result=$this->executeQuery();
		return count($result);
	}
	
	public function getAllPackageHistoryByUserId($userid){
		$user_id=$userid;
		//$sql="select * from choosepackage where user_id=:user_id";
		$sql="SELECT * FROM  choosepackage INNER JOIN package ON choosepackage.package_id=package.package_id where user_id=:user_id";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":user_id", $user_id);
		$result=$this->executeQuery();
		return $result;
	}

	public function savePackageResult($id,$result){
		//$id = $_GET["choosePackage_id"];
		$sql="update choosepackage set package_result=:result where choose_id=:id";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":result", $result);
		$this->bindQueryParam(":id", $id);
		$result=$this->executeQuery();
		return $result;
	}
    //for current package
    public function getChoosePackageByUserId($userId,$todayDate){
        //echo "Date is".$todayDate;
        $sql="select * from choosepackage where user_id=:userId and '$todayDate' between start_date and finish_date";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":userId", $userId);
       // $this->bindQueryParam(":today_date", $todayDate);
        $result=$this->executeQuery();
        return $result;
    }
    //for history package
    public function getChoosePackageByUserIdLastRecord($userId){
        $sql="select * from choosepackage where user_id=:userId order by finish_date desc limit 1";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":userId", $userId);
        
        $result=$this->executeQuery();
        return $result;
    }
    //get number of days in package
    public function getPackageTypeByUserId($userId){
        $sql="SELECT package_type FROM package,choosepackage WHERE choosepackage.package_id=package.package_id AND choosepackage.user_id=:userId";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":userId", $userId);
        $result=$this->executeQuery();
        return $result[0]["package_type"];
    }
    public function getAllPackageHistoryByChooseId($chooseId){
        
        $sql="SELECT * FROM choosepackage where choose_id=$chooseId";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $result=$this->executeQuery();
        return $result;
    }
    //get number of days in package
    public function getPackageTypeByChooseId($chooseId){
        $sql="SELECT package_type FROM package,choosepackage WHERE choosepackage.package_id=package.package_id AND choosepackage.choose_id=:chooseId";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":chooseId", $chooseId);
        $result=$this->executeQuery();
        return $result[0]["package_type"];
    }

}