<?php

class MealPlanController
{

    public function renderMealPlanShow()
    {
        $limit_no_of_record = 20;
        $mealDao = new MealPlanDao();
        $allmeal = $mealDao->getAllMeal();
        $no_of_all_records = count($allmeal); // total no of records
        $maxpage = ceil($no_of_all_records / $limit_no_of_record); // total page
        
        if (@$_GET["page"] < 1)
            $page = 1;
        elseif ($_GET["page"] > $maxpage)
            $page = $maxpage;
        else
            $page = $_GET["page"];
        
        $_SESSION["page"] = $page;
        $start_from = ($page - 1) * 20;
        // echo $start_from;
        $mealbylimit = $mealDao->getAllMealByRows($start_from, $limit_no_of_record);
        // print_r($mealbylimit);
        return new AdminMealPlanView($mealbylimit, $no_of_all_records, $start_from);
    }

    public function renderMealAdd()
    {
        return new AdminMealAddView();
    }

    public function renderMealAddConfirm()
    {
        $typeOfMeal = $_POST["typeOfMeal"];
        $foodId = $_POST["foodId"];
        $eatTime = $_POST["eatTime"];
        $mealDesc = $_POST["mealDesc"];
        
       // print_r($typeOfMeal);
        
        if ($typeOfMeal == "" && $foodId == "" && $eatTime == "" && $mealDesc == "")
            $errors["all_null"] = "Please Enter All Required Fields";
        else {
            if ($typeOfMeal == "")
                $errors["meal_null"] = "Please Enter Type of Meal Plan";
            if ($foodId == "")
                $errors["food_null"] = "Please Choose Food Name";
            if ($eatTime == "")
                $errors["eat_null"] = "Please Enter Eat Time";
            if ($mealDesc == "")
                $errors["desc_null"] = "Please Enter Meal Description";
        }
        if (! empty($errors))
            return new AdminMealAddView($errors);
        else{
            $meal = new MealPlan();
        $meal->setMeal_type($typeOfMeal);
        $meal->setFood_id($foodId);
        $meal->setMeal_time($eatTime);
        $meal->setMeal_desc($mealDesc);
        
        $dest_path = store_uploaded_file(ELEMENT, "./images/meal/");
        
        $_SESSION["mealphoto"] = $dest_path;
        $meal->setMeal_image($dest_path);
        $_SESSION["meal"] = $meal;
        print_r($_SESSION["meal"]);
        return new AdminMealConfirmView();
        }
    }

    public function renderMealAddSave()
    {
        $mealDao = new MealPlanDao();
        $mealDao->saveMealPlan();
        return new AdminMealSaveView();
    }

    public function renderMealEdit()
    {
         $id = $_GET["id"];
        $mealplanDao = new MealPlanDao();
        $mealById = $mealplanDao->getMealById($id);
        return new AdminMealEditView($mealById);
    }

    public function renderMealUpdConfirm()
    {
    $updMealId=$_POST["mealId"];
        $updTypeOfMeal = $_POST["updTypeOfMeal"];
        $updFoodId = $_POST["updFoodId"];
        $updEatTime = $_POST["updEatTime"];
        $updMealDesc = $_POST["updMealDesc"];
       // echo "Type is".$updTypeOfMeal;
       // print_r($updTypeOfMeal);
        if ($updTypeOfMeal == "" && $updFoodId == "" && $updEatTime == "" && $updMealDesc == "")
            $errors["all_null"] = "Please Enter All Required Fields";
        else {
            if ($updTypeOfMeal == "")
                $errors["meal_null"] = "Please Enter Type of Meal Plan";
            if ($updFoodId == "")
                $errors["food_null"] = "Please Choose Food Name";
            if ($updEatTime == "")
                $errors["eat_null"] = "Please Enter Eat Time";
                if ($updMealDesc == "")
                $errors["desc_null"] = "Please Enter Meal Description";
        }
        if (! empty($errors))
            return new AdminMealEditView($errors);
        else{
            $meal = new MealPlan();
            $meal->setMeal_id($updMealId);
           // echo "Type is".$updTypeOfMeal;
            $meal->setMeal_type($updTypeOfMeal);
            $meal->setFood_id($updFoodId);
            $meal->setMeal_time($updEatTime);
            $meal->setMeal_desc($updMealDesc);
            
            $dest_path = store_uploaded_file(ELEMENT, "./images/meal/");
            
            $_SESSION["updmealphoto"] = $dest_path;
            //print_r( $_SESSION["updmealphoto"]);
            $meal->setMeal_image($dest_path);
            
            $_SESSION["update_meal"] = $meal;
           // print_r($_SESSION["update_meal"]);
            return new AdminMealEditConfirmView();
        }
    }

    public function renderMealUpdSave()
    {
        $mealDao = new MealPlanDao();
        $mealDao->saveUpdateMealPlan();
        return new AdminMealEditSaveView();
    }

    public function renderMealDelete()
    {
        return new AdminMealPlanView();
    }
public function renderMealSearch(){
    	$searchMealType = $_POST["searchMealType"];
    	$searchMealTime = $_POST["searchMealTime"];
    	$foodName = $_POST["foodName"];
    	$foodDao = new FoodListDao();
    	$food = $foodDao->getFoodbyFoodName($foodName);
    	if(!empty($food)){
    	$foodId = $food[0]["food_id"];
    	//echo $foodId;
    	$mealplanDao = new MealPlanDao();
    	$searchMeal = $mealplanDao->getMealSearch($searchMealType,$searchMealTime,$foodId);
    	return new AdminMealPlanSearchView($searchMeal);
    	}else{
    		return new AdminMealPlanSearchView($searchMeal=null);
    	}
    }
}