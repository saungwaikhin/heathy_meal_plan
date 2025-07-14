<?php
class AdminRecordUserListController{
/*public function renderUserRecordList(){
		$userdao = new UserDao();
		$UserRecordList=$userdao->getUserRecord();
		return new AdminUserRecordListView($UserRecordList);
		
	}*/
public function renderUserRecordList(){
		$limit_no_of_record=10;//no of record per page
		$userdao = new UserDao();
		$no_of_all_records=$userdao->getAllCount();//total no of records
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if(@$_GET["page"]<1) $page=1;
		elseif(@$_GET["page"]>$maxpage) $page=$maxpage;
		else $page=$_GET["page"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 10;
		$userbylimit=$userdao->getAllRecordByRows($start_from,$limit_no_of_record);
		return new AdminUserRecordListView($userbylimit,$no_of_all_records,$start_from);
	}
	
	public function renderUserRecordPackage(){
		$id =@$_SESSION["adminViewUserId"];
	    $choosepackagedao=new ChoosePackageDao();
		$userpackage=$choosepackagedao->getAllPackageHistoryByUserId($id);
	    return new AdminUserRecordPackageView($userpackage);
	}
	
	public function renderUserRecordDailyFood(){
	    return new AdminUserRecordDailyFood();
	}
	
public function renderBmiRecord(){
		$_SESSION["adminViewUserId"]=@$_GET["adminViewUserId"];
		//echo "user id view by admin is".$_SESSION["adminViewUserId"];
		$_SESSION["adminViewUserName"]=@$_GET["adminViewUserName"];
		//echo "Name is" .  @$_SESSION["adminViewUserName"];
		//return new AdminUserRecordBMIView();
		$recordbmidao=new UserDao();
		//$no_of_all_bmirecords=$recordbmidao->getAllBmiUser($id);//total no of records
		$record=$recordbmidao->getAllBmiByUser($_SESSION["adminViewUserId"]);
		return new AdminUserRecordBMIView($record);
		
	}
	public function renderBmiRecordbyUser(){
	    $adminSearchUserId=@$_POST["search"];
	   
	   // echo "search id is".$adminSearchUserId;
	   $userDao=new UserDao();
	   $userId=$userDao->getUserIdByUserName($adminSearchUserId);
	   //print_r($userId);
	   //echo "Id is".$userId[0]["user_id"];
	   $_SESSION["adminViewUserId"]=$userId[0]["user_id"];
	   $_SESSION["adminViewUserName"]=$userId[0]["name"];
	    $recordbmidao=new UserDao();
	   
	    $record=$recordbmidao->getAllBmiByUser($userId[0]["user_id"]);
	    return new AdminUserRecordBMIView($record);
	    
	}
	public function renderBmiResult(){
	    $recordbmidao=new UserDao();
	    //$no_of_all_bmirecords=$recordbmidao->getAllBmiUser($id);//total no of records
	    $record=$recordbmidao->getAllBmiByUser($_SESSION["adminViewUserId"]);
	    return new AdminUserRecordBMIView($record);
	    
	}
	public function renderBmiRecordBack(){
		//return new BmiRecordBackView();
	}
}