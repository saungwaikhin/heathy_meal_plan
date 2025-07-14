<?php

class AdminUserRecordDailyFoodController
{   private $currentDay;

private $start_from;

    public function renderUserRecordDailyFood()
    {
        // $_SESSION["adminViewuserName"]=@$_GET["adminViewUserName"];
        // echo "Name is" . $_SESSION["adminViewuserName"];
        /*
         * $userdao = new DailyFoodPlanDao();
         * $UserDailyFood=$userdao->getUserDailyFood();
         * return new AdminUserRecordDailyFoodView($UserDailyFood);
         */
        $adminViewChoosePackageId = $_GET["adminViewUserChoosedPackageId"];
        $chooseDao = new ChoosePackageDao();
        $chooseResult = $chooseDao->getAllPackageHistoryByChooseId($adminViewChoosePackageId);
        print_r($chooseResult);
        $_SESSION["admin_view_choose_id"] = $_GET["adminViewUserChoosedPackageId"];
       

       // $dailyFoodPlanDao = new DailyFoodPlanDao();
       // $this->flag["current_day"] = $dailyFoodPlanDao->checkDailyFoodPlanByChooseIdandDay($chooseResult[0]["choose_id"], $this->currentDay + 1);
       // $this->flag["next_day"] = $dailyFoodPlanDao->checkDailyFoodPlanByChooseIdandDay($chooseResult[0]["choose_id"], $this->currentDay + 2);

        $limit_no_of_record = 7;
         @$chooseId =  $_SESSION["admin_view_choose_id"];
        $choosePackageDao = new ChoosePackageDao();
        @$numberOfDay = $choosePackageDao->getPackageTypeByChooseId($chooseId);
         echo "Days is" . $numberOfDay;
       /* $maxpage = ceil($numberOfDay / $limit_no_of_record);
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
            $page = floor($this->currentDay / 7) * 7;
            $startpage = floor($this->currentDay / 7);
            $this->start_from = $page;
            $_SESSION['page'] = $startpage + 1;
        }

        $dailyPage = @$_GET["dailypage"];
        // echo "Daily current page=" . @$dailyPage;
        // echo "Daily page is=" . @$_GET["dailypage"];
        // show current day page
        if (! isset($_GET["dailypage"])) {

            $dailyPage = $this->currentDay + 1;
        }
        if ( empty($_GET["dailypage"]))
            $dailyPage = 1;
       
            $dailyFood = $this->renderDailyFoodByDay($_SESSION["admin_view_choose_id"], $dailyPage);
             */
            $dailyFoodPlanDao = new DailyFoodPlanDao();
            $result = $dailyFoodPlanDao->getDailyFoodPlanByChooseId($_SESSION["admin_view_choose_id"]);
           // print_r($result);
            return new AdminUserRecordDailyFoodView($numberOfDay, $result);
    }

    public function renderUserRecordDailyFoodDetail()
    {
        $userdao = new DailyFoodPlanDao();
        $UserDailyFoodDetail = $userdao->getUserDailyFoodDetail();
        return new AdminUserRecordDailyFoodDetailView($UserDailyFoodDetail);
    }

    public function currentDayCalculation($start)
    {
        $today = date_create(date("Y-m-d"));
        $startDate = date_create($start);

        $dateDiff = date_diff($startDate, $today);
        return $dateDiff->format("%R%a");
    }
    public function renderDailyFoodByDay($chooseId, $dailyPage)
    {
        // $choosePackage = new ChoosePackageDao();
        // $choosePackageResult = $choosePackage->getChoosePackageByUserId($_SESSION["userId"], date("Y-m-d"));
        $dailyFoodPlanDao = new DailyFoodPlanDao();
        $result = $dailyFoodPlanDao->getDailyFoodPlanByChooseIdandDay($chooseId, $dailyPage);
        return $result;
    }
}