<?php
class StartController{
	public function renderStart(){
	    $userId=$_SESSION["loginUser"][0]["user_id"];
	    
	    $chooseid = $_GET["choosePackageid"];//$_GET["id"]
	    //echo "package id is=".$id;
	    //print_r($id);
	    $packagedao = new PackageDao();
	    //$package = $packagedao->getPackageByPackageType($id);
	    echo "Type is";
	    //print_r($package);
	    //$package_id = $package[0]["package_id"];
	    $package_type = $packagedao->getPackageByPackageType($chooseid);
	    $day = $package_type-1;
	    $startDate =date('Y-m-d');
	    
	    $finishDate=date('Y-m-d', strtotime($startDate . '+ '.$day.' days'));
	    
		$choosepackagedao = new ChoosePackageDao();
		$choosepackagedao->savePackage($chooseid,$startDate,$finishDate);
		
		return new PackageStartView();
	}
}