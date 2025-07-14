<?php
class PackageConroller{
	public function renderPackageShow(){
		$limit_no_of_record = 5;
	    $packageDao = new PackageDao();
	    $no_of_all_records = count($packageDao->getAllPackage());//total no of records
	    //print_r($no_of_all_records);
	    $maxpage = ceil($no_of_all_records/$limit_no_of_record);//total page
	    
	    if(@$_GET["page"]<1)
	        $page =1;
	    elseif($_GET["page"]>$maxpage)
	       $page = $maxpage;
	    else 
	        $page = $_GET["page"];
	    $_SESSION["page"] = $page;
	    $start_from = ($page-1)*5;
	    //echo $start_from;
	    $packagebylimit = $packageDao->getAllPackageByRows($start_from, $limit_no_of_record);
		
		return new AdminPackageView($packagebylimit, $no_of_all_records, $start_from);
	}
	
	public function renderPackageAdd(){
		return new AdminPackageAddView();
	}
	
	public function renderPackageAddConfirm(){
	    $pName = $_POST["pName"];    	
	    $pDay = $_POST["pDay"];
	    $pDescription = $_POST["pDescription"];
	    
	    if($pName=="" && $pDay=="" && $pDescription=="")
	        $errors["all_null"] = "Please Enter All Required Fields";
	    else{
	        if($pName=="")
	            $errors["name_null"] = "Please Enter Package Name";
	        elseif($pName!=""){
	        	$packagedao = new PackageDao();
	        	$package = $packagedao->getPackageByName();
	        	//echo $package;
	        	if($package){
	        		$errors["name_exist"] = "Package Name Already Exist";
	        		return new AdminPackageAddView($errors);
	        	}
	        }
	        if($pDay=="")
	            $errors["day_null"] = "Please Enter Package Day";
	        if($pDescription=="")
	            $errors["desc_null"] = "Please Enter Package Description";
	    }
	    if(!empty($errors))
	        return new AdminPackageAddView($errors);
	    
	    if(empty($errors)){
	    	$package = new Package();
	    	$package->setName($pName);
	    	$package->setType($pDay);
	    	$package->setDescription($pDescription);
	    	
	    	$_SESSION["package"]=$package;
	    	//print_r($_SESSION["package"]);
	    	
	        return new AdminPackageConfirmView();
	    }
	}
	
	public function renderPackageAddSave(){
		$packagedao=new PackageDao();
		$packagedao->savePackage();
	    return new AdminPackageSaveView();
	}
	
	public function renderPackageEdit(){
	    return new AdminPackageEditView();
	}
	
	public function renderPackageUpdConfirm(){
		$updPId=$_POST["packageId"];
	    $updPName = $_POST["updPName"];
	    $updPDay = $_POST["updPDay"];
	    $updDescription = $_POST["updPDescription"];
	    
	    if($updPName=="" && $updPDay=="" && $updDescription=="")
	        $errors["all_null"] = "Please Enter All Required Fields";
	    else{
	        if($updPName=="")
	           $errors["name_null"] = "Please Enter Package Name";
	           
	           if($updPDay=="")
	           $errors["day_null"] = "Please Enter Package Day";
	           
	           if($updDescription=="")
	           $errors["desc_null"] = "Please Enter Package Description";
	    }
	    if(!empty($errors))
	       return new AdminPackageEditView($errors);
	    
	    if(empty($errors)){
	    	$update_package=new Package();
	    	$update_package->setId($updPId);
	    	$update_package->setName($updPName);
	    	$update_package->setType($updPDay);
	    	$update_package->setDescription($updDescription);
	    	$_SESSION["update_package"]=$update_package;
	    	//print_r($_SESSION["update_package"]);
	    	return new AdminPackageEditConfirmView();
	    }
	       
	}
	
	public function renderPackageUpdSave(){
	    $packagedao = new PackageDao();
	    $packagedao->updateSavePackage();
	    
	    return new AdminPackageEditSaveView();
	}
	
	public function renderPackageDelete(){
		$packagedao= new PackageDao();
		$packagedao->deletePackage();
		
	    return new AdminPackageView();
	}
	
public function SavePackage(){
		$choosedao=new ChoosePackageDao();
		$packageid=$_GET["packageid"];

		$resultfinishdate=$choosedao->getFinishDate();
		//print_r($resultfinishdate);
		if (count($resultfinishdate)>0){
			//echo "Package exist".$resultfinishdate[0]["finish_date"];

			/*if($resultfinishdate[0]["start_date"]=="" && $resultfinishdate[0]["finish_date"]=="" || $resultfinishdate[0]["finish_date"]<date("Y-m-d") ){
				$errors["package_exist"]="Current package is not finish";
				return new PackageExistView($errors);*/
				
			if($resultfinishdate[0]["finish_date"]<=date("Y-m-d")){
			   //echo "Dateis less than";
				$nulldate=$choosedao->getNullDate();
				//print_r($nulldate);
				//echo "Null date";
				if(empty($nulldate)){
				  //  echo "empty null date";
					$choosepackage=$choosedao->saveChoosePackage();
					$choosepackagedao=new ChoosePackageDao();
					$result=$choosepackagedao->getAllPackageHistoryByUserId();
					return new PackageHistoryView($result);
				}else{
					$errors["package_exist"]="Your current subscription package is not start or finish.";
					return new PackageExistView($errors);
				}
				
			}else{
				$errors["package_exist"]="Your current subscription package is not finish";
					return new PackageExistView($errors);
			}
		}else{
			$user_id=$_SESSION["loginUser"][0]['user_id'];
			$choosepackage=$choosedao->saveChoosePackage();
			$packhistdao=new ChoosePackageDao();
		$packhistbylimit=$packhistdao->getAllPackageHistoryByUserId($user_id);
		return new PackageHistoryView($packhistbylimit,"");
			//return new PackageHistoryView($choosepackage,$packageid,@$finishdate);
		}

	}
	public function savePackageConfirm(){
		return new PackageConfirmView();
	}
	
	public function savePackageCancel(){
		return new HomeView();
	}
	
}