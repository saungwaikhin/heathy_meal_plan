<?php
class PackageHistoryController{
	private $recommendresult;
	private $statusCount;
	public function renderPackageHistory(){
		$userid=$_SESSION["loginUser"][0]['user_id'];
		$packhistdao=new ChoosePackageDao();
		$packhistbylimit=$packhistdao->getAllPackageHistoryByUserId($userid);
		return new PackageHistoryView($packhistbylimit,"");
		//return new PackageHistoryView("","");
	}
	
	public function renderPackageHistoryResult(){
		$choosePackage_id = $_GET["choosePackage_id"];
		$packageDao=new PackageDao();
		$no_of_package_day=$packageDao->getPackageByPackageType($choosePackage_id);
		//echo "No of Day=".$no_of_package_day;
		$dailyfoodDao = new DailyFoodPlanDao();
		$dailyfood = $dailyfoodDao->getAllDailyFood($choosePackage_id);
		$totalResult = $no_of_package_day*4;
		//echo $totalResult;
		//$status = $dailyfood[0]["status"];
		//echo $status;
		//print_r($dailyfood);
		foreach ($dailyfood as $key=> $value){
			if($value["status"]==1){
				++$this->statusCount;
			}
		}
		/*if($status==1){
			$statusCount = count($dailyfoodDao->getAllDailyStatus($status));
			//echo $statusCount;
		}*/
		
		$recommend = ceil(($this->statusCount * 100)/$totalResult);
		if($recommend<40){
			$this->recommendresult="Impossible to weight gain or loss";
		}elseif ($recommend<60){
			$this->recommendresult="Not sure to weight gain or loss";
		
	}elseif ($recommend<80){
			$this->recommendresult="Average to weight gain or loss";
		
	}elseif ($recommend<100){
			$this->recommendresult="Cool to weight gain or loss";
		}else{
			$this->recommendresult="Excellent to weight gain or loss";
		}
			
		$packhistdao=new ChoosePackageDao();
		$packhistdao->savePackageResult($choosePackage_id,$this->recommendresult);
		$packhistbylimit=$packhistdao->getAllPackageHistoryByUserId($_SESSION["loginUser"][0]['user_id']);
		return new PackageHistoryView($packhistbylimit,$recommend);
	}
	
	public function renderPackageHistoryStart(){
		return new PackageStartView();
	}
}