<?php
class FoodListController{
	public function renderFoodListShow(){
	    $limit_no_of_record = 5;
	    $foodDao = new FoodListDao();
	    $no_of_all_records = $foodDao->getAllFood();//total no of records
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
	    $foodbylimit = $foodDao->getAllFoodByRows($start_from, $limit_no_of_record);
	    
		return new AdminFoodListView($foodbylimit, $no_of_all_records, $start_from);  
	}
	
	public function renderFoodAdd(){
		return new AdminFoodAddView();
	}

	public function renderFoodAddConfirm(){
		$foodName = strtolower($_POST["foodName"]);
		$catId = $_POST["catId"];
		$foodDescription = $_POST["foodDescription"];

		if($foodName=="" && $catId=="" && $foodDescription==""){
			$errors["all_null"] = "Please Enter All Required Fields";
		}else{
			if($foodName=="")
				$errors["fname_null"] = "Please Enter Food Name";
				elseif($foodName!=""){
				    $foodDao = new FoodListDao();
				    $food = $foodDao->getFoodbyFoodName($foodName);
				    if(!empty($food)){
				        $errors["food_exit"] = "Food Name Already Exit";
				        return new AdminFoodAddView($errors);
				    }
				}

			if($catId=="")
			$errors["cat_null"] = "Please Enter Category";

			if($foodDescription=="")
				$errors["fdesc_null"] = "Please Enter Food Description";
		}
		if(!empty($errors))
			return new AdminFoodAddView($errors);
		
		if(empty($errors)){
		    $food = new Food();
		    $food->setName($foodName);
		    $food->setCatId($catId);
		    $food->setDescription($foodDescription);
		    
		    $_SESSION["food"] = $food;
		    
			return new AdminFoodListConfirmView();
		}
	}

	public function renderFoodAddSave(){
        $foodDao = new FoodListDao();
        $foodDao->saveFood();

		return new AdminFoodListSaveView();
	}

	public function renderFoodEdit(){
		return new AdminFoodListEditView();
	}

	public function renderFoodUpdateConfirm(){
		$updFoodId = $_POST["foodId"];
		$updFoodName = strtolower($_POST["updFoodName"]);
		$updCategory = $_POST["updCategory"];
		$updFoodDescription = $_POST["updFoodDescription"];

		if($updFoodName=="" && $updCategory=="" && $updFoodDescription==""){
			$errors["all_null"] = "Please Enter All Required Fields";
		}else{
			if($updFoodName=="")
				$errors["fname_null"] = "Please Enter Food Name";

			if($updCategory=="")
			     $errors["cat_null"] = "Please Enter Category";

			if($updFoodDescription=="")
				$errors["fdesc_null"] = "Please Enter Food Description";
		}
		
		if(!empty($errors))
			return new AdminFoodListEditView($errors);
			
		if(empty($errors)){
			$update_food = new Food();
			$update_food->setId($updFoodId);
			$update_food->setName($updFoodName);
			$update_food->setCatId($updCategory);
			$update_food->setDescription($updFoodDescription);
			
			$_SESSION["update_food"] = $update_food;
			
			return new AdminFoodListEditConfirmView();
		}
	}

	public function renderFoodUpdSave(){
		$foodDao = new FoodListDao();
		$foodDao->updateSaveFood();

		return new AdminFoodListEditSaveView();
	}

	public function renderFoodDelete(){
		$foodDao = new FoodListDao();
		$foodDao->deleteFood();
	$foodlistCtl=new FoodListController();
	$foodlistCtl->renderFoodListShow();
		//return new AdminFoodListView();
	}
	
	public function renderFoodSearch(){
	    $searchfood = $_POST["searchfood"];
	    $foodDao = new FoodListDao();
	    $searchFood = $foodDao->getFoodbyFoodName($searchfood);
	    
	    return new AdminFoodListSearchView($searchFood);
	}
}