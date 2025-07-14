<?php

class DaliyFoodPlanController
{

    private $currentDay;

    private $start_from;

    public function renderDailyFoodPlanShow()
    {
        $choosePackage = new ChoosePackageDao();
        $choosePackageResult = $choosePackage->getChoosePackageByUserId($_SESSION["loginUser"][0]["user_id"], date("Y-m-d"));
       /* ?>
        <pre>
        <?php print_r($choosePackageResult);?>
        </pre>
        <?php */
        if ($choosePackageResult) {
            $_SESSION["choose_id"] = $choosePackageResult[0]["choose_id"];
            $this->currentDay = $this->currentDayCalculation($choosePackageResult[0]["start_date"]);
            $showCurrentDay = $this->currentDay + 1;
            // echo "Current day is" . $showCurrentDay . "<br>";
            
            $dailyFoodPlanDao = new DailyFoodPlanDao();
            $this->flag["current_day"] = $dailyFoodPlanDao->checkDailyFoodPlanByChooseIdandDay($choosePackageResult[0]["choose_id"], $this->currentDay + 1);
            $this->flag["next_day"] = $dailyFoodPlanDao->checkDailyFoodPlanByChooseIdandDay($choosePackageResult[0]["choose_id"], $this->currentDay + 2);
 
        } else {/*
            $choosePackageResult = $choosePackage->getChoosePackageByUserIdLastRecord($_SESSION["loginUser"][0]["user_id"]);
            if ($choosePackageResult) {
                $_SESSION["choose_id"] = $choosePackageResult[0]["choose_id"];
                $this->flag["current_day"] = TRUE;
                $this->flag["next_day"] = TRUE;
     
            } else {*/
                unset($_SESSION["choose_id"]);
                $this->flag["no_package"] = "NoPackage";
                $numberOfDay = 0;
                $dailyFood = 0;
                $currentDay = 0;
                $start_from = 0;
                return new DailyFoodPlanView($numberOfDay, $start_from, $dailyFood, $this->flag, $currentDay);
           //}
        }
        
        // echo "session choose package id is=" . $_SESSION["choose_id"];
        
        $limit_no_of_record = 7;
        @$userId = $_SESSION["loginUser"][0]["user_id"];
        $choosePackageDao = new ChoosePackageDao();
        @$numberOfDay = $choosePackageDao->getPackageTypeByUserId($userId);
        // echo "Days is" . $numberOfDay;
        $maxpage = ceil($numberOfDay / $limit_no_of_record);
        if (@$_GET["page"] < 1)
            $page = 1;
        elseif ($_GET["page"] > $maxpage)
            $page = $maxpage;
        else
            $page = $_GET["page"];
        $_SESSION['page'] = $page;
        
        // show start current day page
        if (isset($_GET["page"]))
            $this->start_from = ($page - 1) * 7;
        else {
            $page=floor($this->currentDay / 7) * 7;
            $startpage=floor($this->currentDay / 7);
            $this->start_from = $page;
            $_SESSION['page'] = $startpage+1;
        }
        
        $dailyPage = @$_GET["dailypage"];
        // echo "Daily current page=" . @$dailyPage;
        // echo "Daily page is=" . @$_GET["dailypage"];
        // show current day page
        if (! isset($_GET["dailypage"])) {
            
            $dailyPage =  $this->currentDay + 1;
        }
        if (empty($this->currentDay) && empty($_GET["dailypage"]))
            $dailyPage = 1;
        
        $dailyFood = $this->renderDailyFoodByDay($_SESSION["choose_id"], $dailyPage);
        return new DailyFoodPlanView($numberOfDay, $this->start_from, $dailyFood, @$this->flag, $this->currentDay + 1);
    }

    /*
     * public function renderDailyFoodPlanCHECKED()
     * {
     * return new DailyFoodPlanCheckedView();
     * }
     */
    public function renderDailyFoodPlanRequest()
    {
        $choosePackage = new ChoosePackageDao();
        $choosePackageResult = $choosePackage->getChoosePackageByUserId($_SESSION["loginUser"][0]["user_id"], date("Y-m-d"));
        $this->currentDay = $this->currentDayCalculation($choosePackageResult[0]["start_date"]);
        $showCurrentDay = $this->currentDay + 1;
        // echo "Current day is" . $showCurrentDay . "<br>";
        
        $dailyFoodPlanDao = new DailyFoodPlanDao();
        
        // echo "User BMI result is.=" . $_SESSION["loginUser"][0]["bmi_result"];
        $bmiResult = $this->determineBmiResult($_SESSION["loginUser"][0]["bmi_result"]);
        // echo "You need to weight =" . $bmiResult;
        $mealList = "";
        
        for ($i = 1; $i < 5; $i ++) {
            switch ($i) {
                case 1:
                    $mealList = $dailyFoodPlanDao->getMealIdByMealTime("breakfast_" . $bmiResult);
                    // echo "case1";
                    break;
                case 2:
                    $mealList = $dailyFoodPlanDao->getMealIdByMealTime("lunch_" . $bmiResult);
                    // echo "case2";
                    break;
                case 3:
                    $mealList = $dailyFoodPlanDao->getMealIdByMealTime("snack_" . $bmiResult);
                    // echo "case3";
                    break;
                case 4:
                    $mealList = $dailyFoodPlanDao->getMealIdByMealTime("dinner_" . $bmiResult);
                    // echo "case4";
                    break;
            }
            
            // echo "<pre>";
            // print_r($mealList);
            // echo "<pre>";
            $range = count($mealList);
            
            if ($range <= 1)
                $mealId = 0;
            else
                $mealId = rand(0, -- $range);
            // echo "Range is" . $range . "Random id=" . $mealId . "<br>";
            $currentDay;
            if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_REQUEST_NEXT_DAY)
                $currentDay = $this->currentDay + 2;
            else
                $currentDay = $this->currentDay + 1;
            $dailyFoodPlanDao->saveDailyFoodPlanByPackageId($currentDay, $choosePackageResult[0]["choose_id"], $mealList[$mealId]["meal_id"]);
            // echo "requested food list";
        }
        // }
        return new DailyFoodPlanSaveView();
    }

    public function renderDailyFoodByDay($chooseId, $dailyPage)
    {
        // $choosePackage = new ChoosePackageDao();
        // $choosePackageResult = $choosePackage->getChoosePackageByUserId($_SESSION["userId"], date("Y-m-d"));
        $dailyFoodPlanDao = new DailyFoodPlanDao();
        $result = $dailyFoodPlanDao->getDailyFoodPlanByChooseIdandDay($chooseId, $dailyPage);
        return $result;
    }

    public function currentDayCalculation($start)
    {
        $today = date_create(date("Y-m-d"));
        $startDate = date_create($start);
        
        $dateDiff = date_diff($startDate, $today);
        return $dateDiff->format("%R%a");
    }

    public function determineBmiResult($bmi)
    {
        if ($bmi <= 18.5)
            return "gain";
        elseif ($bmi > 18.5 && $bmi <= 24.99)
            return "normal";
        else
            return "loss";
    }

    public function renderDailyFoodPlanDoneSave()
    {
        
        $dailyId = $_SESSION["dailyId"];
        $dailyFoodPlanDao = new DailyFoodPlanDao();
        $dailyFoodPlanDao->updateDailyFoodPlanStatus($dailyId);
        $dailyFoodPlanCon = new DaliyFoodPlanController();
        return $dailyFoodPlanCon->renderDailyFoodPlanShow();
    }
    public function renderDailyFoodPlanDone()
    {
       
        $_SESSION["dailyId"] = $_POST["dailyId"];
        return new DailyFoodPlanDoneSaveView();
    }
    public function renderDailyFoodPlanBack(){
        $dailyFoodPlanCon = new DaliyFoodPlanController();
        return $dailyFoodPlanCon->renderDailyFoodPlanShow();
    }
}