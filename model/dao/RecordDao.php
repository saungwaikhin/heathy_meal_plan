<?php
class RecordDao extends DAO{
    public function getUserByRecord(){
       $record = $_POST["record_id"];    
        $sql="select * from record where record_id=:record_id";	
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":record_id",$recordID);
		$result=$this->executeQuery();
		return $result;
    }
public function getRecordByUserId(){
		$userId=$_SESSION["loginUser"][0]["user_id"];
		$sql="select * from record where user_id=:userId order by updated_date desc";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":userId", $userId);        
        $result=$this->executeQuery();
        //print_r($result);
        return $result;
	}
    public function saveRecord(){
        $record_user= $_SESSION["record_user"];
        $user_id= $_SESSION["loginUser"][0]["user_id"];
        //echo $user_id;
        $date=date("Y-m-d");
        
        $sql="insert into record (record_id,height_feet,height_inches,weight,bmi,user_id,updated_date)values(null,:height_feet,:height_inches,:weight,:bmi,:user_id,:updated_date)";
        
        $this->openDB();
        $this->prepareQuery($sql);

		$this->bindQueryParam(":height_feet",$record_user->getHeightFeet());
		$this->bindQueryParam(":height_inches",$record_user->getHeightInches());
		$this->bindQueryParam(":weight", $record_user->getWeight());
		$this->bindQueryParam(":bmi", $record_user->getBmi());
		$this->bindQueryParam(":user_id",$user_id);
		$this->bindQueryParam(":updated_date",$date);
       
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result){
        
            $this->commitTrans();
            $this->updateBmiResult($user_id, $record_user->getBmi());
        }else
            $this->rollbackTrans();
        
        if(isset($_SESSION["record_user"]))
            unset($_SESSION["record_user"]);
    }
    
  public function updateBmiResult($user_id,$bmi){
    	echo "Upppppp".$user_id."=".$bmi;
    	$sql="update user set bmi_result=:bmiresult where user_id=:userid";
    	$this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":bmiresult",$bmi);
		$this->bindQueryParam(":userid",$user_id);
		
		$this->beginTrans();
        $result = $this->executeUpdate();
        
        if($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
    }
  
}