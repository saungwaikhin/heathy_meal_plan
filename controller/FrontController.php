<?php

class FrontController
{

	public function execute()
	{
		if (! empty($_GET)) {
			if (@$_GET["usecase"] == UC_REG) {
				$_POST["usecase"] = UC_REG;
				$_POST["action"] = ACT_REG_EDT;
			}
			if ($_GET["usecase"] == UC_HOME) {
				$_POST["usecase"] = UC_HOME;
				$_POST["action"] = ACT_HOME;
			}
			if ($_GET["usecase"] == UC_A_HOME) {
				$_POST["usecase"] = UC_A_HOME;
				$_POST["action"] = ACT_A_HOME;
			}

			if (@$_GET['usecase'] == UC_LOGIN) {
				$_POST["usecase"] = UC_LOGIN;
				$_POST["action"] = ACT_LOGIN_FIRST;
			}
			// image file upload
			if ($_GET["usecase"] == UC_FILE) {
				$_POST["usecase"] = UC_FILE;
				$_POST["action"] = ACT_FILE_UPLOAD_DOWNLOAD;
			}
			// forget password
			if ($_GET["usecase"] == UC_FORGET_PASS) {
				$_POST["usecase"] = UC_FORGET_PASS;
				$_POST["action"] = ACT_FORGET_PASS;
			}
			if (@$_GET['usecase'] == UC_LOGOUT) {
				$_POST["usecase"] = UC_LOGOUT;
				$_POST["action"] = ACT_LOGOUT;
			}
			if (@$_GET["usecase"] == UC_RECORD) {
				$_POST["usecase"] = UC_RECORD;
				$_POST["action"] = ACT_RECORD;
			}
			if (@$_GET["usecase"] == UC_UPD_PROFILE) {
				$_POST["usecase"] = UC_UPD_PROFILE;
				$_POST["action"] = ACT_UPD_PROFILE_EDT;
			}
			// user update record
			if (@$_GET["usecase"] == UC_UPDATE_RECORD) {
				$_POST["usecase"] = UC_UPDATE_RECORD;
				$_POST["action"] = ACT_UPDATE_RECORD;
			}
			// daily food plan
			if ($_GET['usecase'] == UC_DAILY_FOOD_PLAN) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_SHOW;
			}
			if ($_GET['usecase'] == UC_DAILY_FOOD_PLAN_BY_DAY) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN_BY_DAY;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_BY_DAY;
			}
			if ($_GET["usecase"] == UC_A_RECORD_USER_LIST) {
				$_POST["usecase"] = UC_A_RECORD_USER_LIST;
				$_POST["action"] = ACT_A_RECORD_USER_LIST;
			}
			if ($_GET["usecase"] == UC_A_RECORD_USER) {
				$_POST["usecase"] = UC_A_RECORD_USER;
				$_POST["action"] = ACT_A_RECORD_USER;
			}
			//record user bmi
			if ($_GET["usecase"] == UC_A_RECORD_USER_BMI) {
				$_POST["usecase"] = UC_A_RECORD_USER_BMI;
				$_POST["action"] = ACT_A_RECORD_USER_BMI;
			}
			//Admin view user record daily food
			if ($_GET["usecase"] == UC_A_DAILY_FOOD_USER) {
				$_POST["usecase"] = UC_A_DAILY_FOOD_USER;
				$_POST["action"] = ACT_A_DAILY_FOOD_USER;
			}
			if ($_GET["usecase"] == UC_A_DAILY_FOOD_DETAIL) {
				$_POST["usecase"] = UC_A_DAILY_FOOD_DETAIL;
				$_POST["action"] = ACT_A_DAILY_FOOD_DETAIL;
			}
				
			// packge
			if ($_GET["usecase"] == UC_A_PACKAGE) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE;
			}
			if ($_GET["usecase"] == UC_PACKAGE_EDIT) {
				$_POST["usecase"] = UC_PACKAGE_EDIT;
				$_POST["action"] = ACT_A_PACKAGE_EDIT;
			}
			if ($_GET["usecase"] == UC_PACKAGE_DELETE) {
				$_POST["usecase"] = UC_PACKAGE_DELETE;
				$_POST["action"] = ACT_A_PACKAGE_DELETE;
			}
			//Admin view user package
			if ($_GET["usecase"] == UC_A_PACKAGE_USER) {
				$_POST["usecase"] = UC_A_PACKAGE_USER;
				$_POST["action"] = ACT_A_PACKAGE_USER;
			}
			// foodlist
			if ($_GET["usecase"] == UC_A_FOOD) {
				if (isset($_SESSION["page"]))
				unset($_SESSION["page"]);
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD;
			}
			if ($_GET["usecase"] == UC_FOOD_EDT) {
				$_POST["usecase"] = UC_FOOD_EDT;
				$_POST["action"] = ACT_A_FOOD_EDIT;
			}
			if ($_GET["usecase"] == UC_FOOD_DEL) {
				$_POST["usecase"] = UC_FOOD_DEL;
				$_POST["action"] = ACT_A_FOOD_DELETE;
			}
			// meal
			if ($_GET["usecase"] == UC_A_MEAL) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL;
			}
			if($_GET["usecase"] == UC_MEAL_EDT){
				$_POST["usecase"] = UC_MEAL_EDT;
				$_POST["action"] = ACT_A_MEAL_EDIT;
			}

			if ($_GET["usecase"] == UC_A_BMI) {
				$_POST["usecase"] = UC_A_BMI;
				$_POST["action"] = ACT_A_BMI;
			}

			// choose package

			if ($_GET["usecase"] == UC_CHOOSE_PACKAGE) {
				$_POST["usecase"] = UC_CHOOSE_PACKAGE;
				$_POST["action"] = ACT_CHOOSE_PACKAGE;
			}
			// PackageHistory
			if ($_GET["usecase"] == UC_PACKAGE_HISTORY) {
				$_POST["usecase"] = UC_PACKAGE_HISTORY;
				$_POST["action"] = ACT_PACKAGE_LIST;
			}

			if ($_GET["usecase"] == UC_PAK_HIS_RESULT) {
				$_POST["usecase"] = UC_PAK_HIS_RESULT;
				$_POST["action"] = ACT_PAK_HIS_RESULT;
			}

			// package history start
			if ($_GET["usecase"] == UC_START) {
				$_POST["usecase"] = UC_START;
				$_POST["action"] = ACT_START;
			}

			// category

			if ($_GET["usecase"] == UC_A_CAT) {
				$_POST["usecase"] = UC_A_CAT;
				$_POST["action"] = ACT_A_CAT;
			}
			if ($_GET["usecase"] == UC_CAT_EDT) {
				$_POST["usecase"] = UC_CAT_EDT;
				$_POST["action"] = ACT_A_CAT_EDIT;
			}
			if ($_GET["usecase"] == UC_CAT_DEL) {
				$_POST["usecase"] = UC_CAT_DEL;
				$_POST["action"] = ACT_A_CAT_DEL;
			}
			// admin update profile
			if ($_GET["usecase"] == UC_ADMIN_UPDATE_PROFILE) {
				$_POST["usecase"] = UC_ADMIN_UPDATE_PROFILE;
				$_POST["action"] = ACT_ADMIN_UPDATE_PROFILE;
			}
		}
		if (empty($_POST)) {
			$_POST["usecase"] = UC_WELCOME;
			$_POST["action"] = ACT_WELCOME;
		}
		if (! empty($_POST)) {
			if (isset($_POST["btnLogin"])) {
				$_POST["usecase"] = UC_LOGIN;
				$_POST["action"] = ACT_LOGIN_CHK;
			}
			// forget password
			if (isset($_POST["btnForgetPassCodeSend"])) {
				$_POST["usecase"] = UC_FORGET_PASS;
				$_POST["action"] = ACT_FORGET_PASS_CNF;
			}

			if (isset($_POST["btnForgetPassReset"])) {
				$_POST["usecase"] = UC_FORGET_PASS;
				$_POST["action"] = ACT_FORGET_PASS_SAVE;
			}
			if (isset($_POST["btnForgetPassCodeCancel"])) {
				$_POST["usecase"] = UC_LOGIN;
				$_POST["action"] = ACT_LOGIN_FIRST;
			}
			if (isset($_POST["btnLoginAdmin"])) {
				$_POST["usecase"] = UC_LOGIN_ADMIN;
				$_POST["action"] = ACT_LOGIN_ADMIN_CHK;
			}
			// register
			if (isset($_POST['btnRegister'])) {
				$_POST["usecase"] = UC_REG;
				$_POST["action"] = ACT_REG_CNF;
				// echo"hello";
			}
			// register confirm
			if (isset($_POST['btnRegisterConfirm'])) {
				$_POST['usecase'] = UC_REG;
				$_POST['action'] = ACT_REG_SAVE;
			}
			// register save and go back to login page
			if (isset($_POST['btnBack'])) {
				if (isset($_SESSION['reg_user']))
				unset($_SESSION['reg_user']);
				$_POST['usecase'] = UC_LOGIN;
				$_POST['action'] = ACT_LOGIN_FIRST;
			}
			// profile update
			if (isset($_POST["btnUpdateProfile"])) {
				$_POST["usecase"] = UC_UPD_PROFILE;
				$_POST["action"] = ACT_UPD_PROFILE_CNF;
			}
			if (isset($_POST["btnUserProfileCancel"])) {
				$_POST["usecase"] = UC_HOME;
				$_POST["action"] = ACT_HOME;
			}
			// profile update photo
			if (isset($_POST["btnUpload"])) {
				$_POST["usecase"] = UC_UPD_PROFILE;
				$_POST["action"] = ACT_UPD_PROFILE_UPLOAD;
			}
			// profile update
			if (isset($_POST["btnAdminProfileCancel"])) {
				$_POST["usecase"] = UC_A_HOME;
				$_POST["action"] = ACT_A_HOME;
			}

			// confirm button
			if (isset($_POST["btnUpdateProfileConfirm"])) {
				$_POST["usecase"] = UC_UPD_PROFILE;
				$_POST["action"] = ACT_UPD_PROFILE_SAVE;
			}
			// profile update and go back to home
			if (isset($_POST["btnHome"])) {
				// if (isset($_SESSION["reg_user"]))
				// unset($_SESSION["reg_user"]);
				$_POST["usecase"] = UC_HOME;
				$_POST["action"] = ACT_HOME;
			}
			if (isset($_POST["btnUpdateRecord"])) {
				$_POST["usecase"] = UC_UPDATE_RECORD;
				$_POST["action"] = ACT_UPDATE_RECORD_CHK;
			}
			if (isset($_POST["btnUpdateRecordConfirm"])) {
				$_POST["usecase"] = UC_UPDATE_RECORD;
				$_POST["action"] = ACT_UPDATE_RECORD_SAVE;
			}
			// Record update confirm cancel
			if (isset($_POST["btnUpdateRecordCacel"])) {
				$_POST["usecase"] = UC_UPDATE_RECORD;
				$_POST["action"] = ACT_UPDATE_RECORD_CANCEL;
			}
			if (isset($_POST["btnUpdateRecordBack"])) {
				$_POST["usecase"] = UC_UPDATE_RECORD;
				$_POST["action"] = ACT_UPDATE_RECORD_BACK;
			}
			// daily food plan checked
			if (isset($_POST['btnDailyFoodChecked'])) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_CHECKED;
			}
			if (isset($_POST["btnRequestFoodList"])) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_REQUEST;
			}
			if (isset($_POST["btnRequestNextDayFoodList"])) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_REQUEST_NEXT_DAY;
			}
			if (isset($_POST["btnDailyFoodDone"])) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_DONE;
			}
			if (isset($_POST["btnDailyFoodDoneSave"])) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_DONE_SAVE;
			}
			if (isset($_POST["btnbackDailyFood"])) {
				$_POST['usecase'] = UC_DAILY_FOOD_PLAN;
				$_POST['action'] = ACT_DALIY_FOOD_PLAN_Back;
			}

			// btnSavePackageConfirm
			if (isset($_POST["btnSavePackageConfirm"])) {
				$_POST["usecase"] = UC_CHOOSE_PACKAGE;
				$_POST["action"] = ACT_PACKAGE_SAVE;
			}
			// btnSavePackageConfirm
			if (isset($_POST["btnSavePackageCancel"])) {
				$_POST["usecase"] = UC_CHOOSE_PACKAGE;
				$_POST["action"] = ACT_PACKAGE_CANCEL;
			}
			// user's record view for admin
			if (isset($_POST["btnUserRecordSearch"])) {
				$_POST["usecase"] = UC_A_RECORD_USER;
				$_POST["action"] = ACT_A_RECORD_USER_SEARCH;
			}
			if (isset($_POST["btnUserRecordBmi"])) {
				$_POST["usecase"] = UC_A_RECORD_USER;
				$_POST["action"] = ACT_A_RECORD_USER;
			}

			if (isset($_POST["btnUserRecordPackage"])) {
				$_POST["usecase"] = UC_A_RECORD_USER;
				$_POST["action"] = ACT_A_RECORD_USER_PACKAGE;
			}

			if (isset($_POST["btnUserRecordDailyFood"])) {
				$_POST["usecase"] = UC_A_RECORD_USER_LIST;
				$_POST["action"] = ACT_A_RECORD_USER_DAILY_FOOD;
			}
			//admiview dailyfood
			if (isset($_POST["btnUserDailyFoodBack"])) {
				$_POST["usecase"] = UC_A_DAILY_FOOD_USER;
				$_POST["action"] = ACT_A_DAILY_FOOD_USER;
			}
			if (isset($_POST["btnUserRecordBack"])) {
				$_POST["usecase"] = UC_A_RECORD_USER_LIST;
				$_POST["action"] = ACT_A_RECORD_USER_LIST;
			}
			// manage package
			if (isset($_POST["btnAddPackage"])) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE_ADD;
			}

			if (isset($_POST["btnPackageAdd"])) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE_ADD_CNF;
			}

			if (isset($_POST["btnPackageConfirm"])) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE_ADD_SAVE;
			}

			if (isset($_POST["btnPackageConfirmCancel"])) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE_ADD;
			}

			if (isset($_POST["btnPackageAddCancel"])) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE;
			}

			if (isset($_POST["btnBackPackage"])) {
				$_POST["usecase"] = UC_A_PACKAGE;
				$_POST["action"] = ACT_A_PACKAGE;
			}

			if (isset($_POST["btnPackageUpd"])) {
				$_POST["usecase"] = UC_PACKAGE_EDIT;
				$_POST["action"] = ACT_A_PACKAGE_UPD_CNF;
			}

			if (isset($_POST["btnPackageUpdCancel"])) {
				$_POST["usecase"] = UC_PACKAGE_EDIT;
				$_POST["action"] = ACT_A_PACKAGE;
			}

			if (isset($_POST["btnPackageUpdConfirm"])) {
				$_POST["usecase"] = UC_PACKAGE_EDIT;
				$_POST["action"] = ACT_A_PACKAGE_UPD_SAVE;
			}

			if (isset($_POST["btnPackageUpdConfirmCancel"])) {
				$_POST["usecase"] = UC_PACKAGE_EDIT;
				$_POST["action"] = ACT_A_PACKAGE_EDIT;
			}
			// manage food
			if (isset($_POST["btnFoodListAdd"])) {
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD_ADD;
			}

			if (isset($_POST["btnFoodAdd"])) {
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD_ADD_CNF;
			}

			if (isset($_POST["btnFoodConfirm"])) {
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD_ADD_SAVE;
			}

			if (isset($_POST["btnFoodAddCancel"])) {
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD;
			}

			if (isset($_POST["btnBackFood"])) {
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD;
			}

			if (isset($_POST["btnFoodUpdate"])) {
				$_POST["usecase"] = UC_FOOD_EDT;
				$_POST["action"] = ACT_A_FOOD_UPD_CNF;
			}

			if (isset($_POST["btnFoodUpdateCancel"])) {
				$_POST["usecase"] = UC_FOOD_EDT;
				$_POST["action"] = ACT_A_FOOD;
			}

			if (isset($_POST["btnFoodUpdConfirm"])) {
				$_POST["usecase"] = UC_FOOD_EDT;
				$_POST["action"] = ACT_A_FOOD_UPD_SAVE;
			}

			if (isset($_POST["btnFoodUpdConfirmCancel"])) {
				$_POST["usecase"] = UC_FOOD_EDT;
				$_POST["action"] = ACT_A_FOOD_EDIT;
			}

			// serach food
			if (isset($_POST["btnSearchFood"])) {
				$_POST["usecase"] = UC_A_FOOD;
				$_POST["action"] = ACT_A_FOOD_SERACH;
			}

			// manage meal plan
			if (isset($_POST["btnMealSearch"])) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL_SEARCH;
			}

			if (isset($_POST["btnMealPlanAdd"])) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL_ADD;
			}

			if (isset($_POST["btnMealAdd"])) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL_ADD_CNF;
			}

			if (isset($_POST["btnMealConfirm"])) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL_ADD_SAVE;
			}

			if (isset($_POST["btnMealAddCancel"])) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL;
			}

			if (isset($_POST["btnBackMeal"])) {
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL;
			}

			if (isset($_POST["btnMealUpdate"])) {
				$_POST["usecase"] = UC_MEAL_EDT;
				$_POST["action"] = ACT_A_MEAL_UPD_CNF;
			}

			if (isset($_POST["btnMealUpdConfirm"])) {
				$_POST["usecase"] = UC_MEAL_EDT;
				$_POST["action"] = ACT_A_MEAL_UPD_SAVE;
			}

			if (isset($_POST["btnMealUpdConfirmCancel"])) {
				$_POST["usecase"] = UC_MEAL_EDT;
				$_POST["action"] = ACT_A_MEAL_EDIT;
			}

			if(isset($_POST["btnMealUpdateCancel"])){
				$_POST["usecase"] = UC_A_MEAL;
				$_POST["action"] = ACT_A_MEAL;
			}

			// category
			if (isset($_POST["btnCatAdd"])) {
				$_POST["usecase"] = UC_A_CAT;
				$_POST["action"] = ACT_A_CAT_ADD_CNF;
			}

			if (isset($_POST["btnCatConfirm"])) {
				$_POST["usecase"] = UC_A_CAT;
				$_POST["action"] = ACT_A_CAT_ADD_SAVE;
			}

			if (isset($_POST["btnCatAddCancel"])) {
				$_POST["usecase"] = UC_A_CAT;
				$_POST["action"] = ACT_A_CAT;
			}

			if (isset($_POST["btnCatUpd"])) {
				$_POST["usecase"] = UC_CAT_EDT;
				$_POST['action'] = ACT_A_CAT_UPD_CNF;
			}

			if (isset($_POST["btnCatUpdCancel"])) {
				$_POST["usecase"] = UC_A_CAT;
				$_POST["action"] = ACT_A_CAT;
			}

			if (isset($_POST["btnCatUpdConfirm"])) {
				$_POST["usecase"] = UC_CAT_EDT;
				$_POST["action"] = ACT_A_CAT_UPD_SAVE;
			}

			if (isset($_POST["btnCatUpdConfirmCancel"])) {
				$_POST["usecase"] = UC_CAT_EDT;
				$_POST["action"] = ACT_A_CAT_EDIT;
			}

			// package exist Ok button
			if (isset($_POST["btnBackHistory"])) {
				$_POST["usecase"] = UC_PACKAGE_HISTORY;
				$_POST["action"] = ACT_PACKAGE_LIST;
			}
		}
		switch ($_POST["usecase"]) {
			case UC_LOGIN:
				if ($_POST["action"] == ACT_LOGIN_FIRST) {
					$ctl = new LoginController();
					return $ctl->renderLogin();
				}
				// forget password
			case UC_FORGET_PASS:
				$ctl = new ForgetPasswordController();
				if ($_POST["action"] == ACT_FORGET_PASS) {
					return $ctl->renderForgetPass();
				}
				if ($_POST["action"] == ACT_FORGET_PASS_CNF) {
					return $ctl->renderForgetPasswordConfirm();
				}
				if ($_POST["action"] == ACT_FORGET_PASS_SAVE) {
					return $ctl->renderForgetPasswordSave();
				}
			case UC_LOGOUT:
				if ($_POST["action"] == ACT_LOGOUT) {
					$ctl = new WelcomeController();
					return $ctl->renderWelcome();
				}

				if ($_POST["action"] == ACT_LOGIN_CHK) {
					$ctl = new LoginController();
					return $ctl->renderLoginCheck();
				}
				if ($_POST["action"] == ACT_LOGIN_ADMIN_CHK) {
					$ctl = new LoginController();
					return $ctl->renderLoginAdminCheck();
				}
			case UC_WELCOME:
				if ($_POST["action"] == ACT_WELCOME) {
					$ctl = new WelcomeController();
					return $ctl->renderWelcome();
				}
			case UC_HOME:
				if ($_POST["action"] == ACT_HOME) {
					$ctl = new HomeController();
					return $ctl->renderHome();
				}
			case UC_A_HOME:
				if ($_POST["action"] == ACT_A_HOME) {
					$ctl = new HomeController();
					return $ctl->renderAdminHome();
				}
				// register
			case UC_REG:
				$ctl = new RegistrationController();
				if ($_POST["action"] == ACT_REG_EDT)
				return $ctl->renderRegisterEdit();
				if ($_POST['action'] == ACT_REG_CNF)
				return $ctl->renderRegisterConfirm();
				if ($_POST['action'] == ACT_REG_SAVE)
				return $ctl->renderRegisterSave();
				// user record

				// update
			case UC_UPD_PROFILE:
				$ctl = new UpdateUserProfileController();
				if ($_POST["action"] == ACT_UPD_PROFILE_EDT)
				return $ctl->UpdateUserProfileEdit();
				// confirm button
				if ($_POST["action"] == ACT_UPD_PROFILE_CNF)
				return $ctl->updateProfileConfirm();
				// upload profile photo
				if ($_POST["action"] == ACT_UPD_PROFILE_UPLOAD)
				return $ctl->updateProfilePhotoSave();
				// save button
				if ($_POST["action"] == ACT_UPD_PROFILE_SAVE)
				return $ctl->updateProfileSave();
			case UC_UPDATE_RECORD:
				$ctl = new RecordUpdateController();
				if ($_POST["action"] == ACT_UPDATE_RECORD)
				return $ctl->renderUserUpdate();
				if ($_POST["action"] == ACT_UPDATE_RECORD_CHK)
				return $ctl->renderRecordConfirm();
				if ($_POST["action"] == ACT_UPDATE_RECORD_SAVE)
				return $ctl->renderRecordSave();
				if ($_POST["action"] == ACT_UPDATE_RECORD_BACK)
				return $ctl->renderUserUpdate();
				if (@$_POST["action"] == ACT_UPDATE_RECORD_CANCEL)
				return $ctl->renderUserUpdateCancel();
				// Daily Food
			case UC_DAILY_FOOD_PLAN:
				$ctl = new DaliyFoodPlanController();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_SHOW)
				return $ctl->renderDailyFoodPlanShow();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_CHECKED)
				return $ctl->renderDailyFoodPlanCHECKED();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_REQUEST)
				return $ctl->renderDailyFoodPlanRequest();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_REQUEST_NEXT_DAY)
				return $ctl->renderDailyFoodPlanRequest();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_DONE)
				return $ctl->renderDailyFoodPlanDone();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_DONE_SAVE)
				return $ctl->renderDailyFoodPlanDoneSave();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_Back)
				return $ctl->renderDailyFoodPlanBack();
			case UC_DAILY_FOOD_PLAN_BY_DAY:
				$ctl = new DaliyFoodPlanController();
				if ($_POST["action"] == ACT_DALIY_FOOD_PLAN_BY_DAY)
				return $ctl->renderDailyFoodPlanShow();
			case UC_A_RECORD_USER_LIST:
				$ctl = new AdminRecordUserListController();
				if ($_POST["action"] == ACT_A_RECORD_USER_LIST)
				return $ctl->renderUserRecordList();
				// user' record (bmi,package,daily food)
			case UC_A_RECORD_USER:
				$ctl = new AdminRecordUserListController();
				if ($_POST["action"] == ACT_A_RECORD_USER)
				return $ctl->renderBmiRecord();
				if ($_POST["action"] == ACT_A_RECORD_USER_PACKAGE)
				return $ctl->renderUserRecordPackage();
				if ($_POST["action"] == ACT_A_RECORD_USER_SEARCH)
				return $ctl->renderBmiRecordbyUser();
			case UC_A_RECORD_USER_BMI:
				$ctl = new AdminRecordUserListController();
				if ($_POST["action"] == ACT_A_RECORD_USER_BMI)
				return $ctl->renderBmiResult();
				/*if ($_POST["action"] == ACT_A_RECORD_USER_DAILY_FOOD)
				 return $ctl->renderUserRecordDailyFood();*/
			case UC_A_DAILY_FOOD_USER:
				$ctl = new AdminUserRecordDailyFoodController();
				if ($_POST["action"] == ACT_A_DAILY_FOOD_USER)
				return $ctl->renderUserRecordDailyFood();

			case UC_A_DAILY_FOOD_DETAIL:
				$ctl = new AdminUserRecordDailyFoodController();
				if ($_POST["action"] == ACT_A_DAILY_FOOD_DETAIL)
				return $ctl->renderUserRecordDailyFoodDetail();
				// package
			case UC_A_PACKAGE:
				$ctl = new PackageConroller();
				if ($_POST["action"] == ACT_A_PACKAGE)
				return $ctl->renderPackageShow();

				if ($_POST["action"] == ACT_A_PACKAGE_ADD)
				return $ctl->renderPackageAdd();

				if ($_POST["action"] == ACT_A_PACKAGE_ADD_CNF)
				return $ctl->renderPackageAddConfirm();

				if ($_POST["action"] == ACT_A_PACKAGE_ADD_SAVE)
				return $ctl->renderPackageAddSave();
				//admin package user
			case UC_A_PACKAGE_USER:
				$ctl = new AdminRecordUserListController();
				if ($_POST["action"] == ACT_A_PACKAGE_USER)
				return $ctl->renderUserRecordPackage();

			case UC_PACKAGE_EDIT:
				$ctl = new PackageConroller();
				if ($_POST["action"] == ACT_A_PACKAGE_EDIT)
				return $ctl->renderPackageEdit();

				if ($_POST["action"] == ACT_A_PACKAGE)
				return $ctl->renderPackageShow();

				if ($_POST["action"] == ACT_A_PACKAGE_UPD_CNF)
				return $ctl->renderPackageUpdConfirm();

				if ($_POST["action"] == ACT_A_PACKAGE_UPD_SAVE)
				return $ctl->renderPackageUpdSave();

			case UC_PACKAGE_DELETE:
				$ctl = new PackageConroller();
				if ($_POST["action"] == ACT_A_PACKAGE_DELETE)
				return $ctl->renderPackageDelete();

				// manage food
			case UC_A_FOOD:
				$ctl = new FoodListController();
				if ($_POST["action"] == ACT_A_FOOD)
				return $ctl->renderFoodListShow();

				if ($_POST["action"] == ACT_A_FOOD_ADD)
				return $ctl->renderFoodAdd();

				if ($_POST["action"] == ACT_A_FOOD_ADD_CNF)
				return $ctl->renderFoodAddConfirm();

				if ($_POST["action"] == ACT_A_FOOD_ADD_SAVE)
				return $ctl->renderFoodAddSave();

				if ($_POST["action"] == ACT_A_FOOD_SERACH)
				return $ctl->renderFoodSearch();

			case UC_FOOD_EDT:
				$ctl = new FoodListController();
				if ($_POST["action"] == ACT_A_FOOD_EDIT)
				return $ctl->renderFoodEdit();

				if ($_POST["action"] == ACT_A_FOOD)
				return $ctl->renderFoodListShow();

				if ($_POST["action"] == ACT_A_FOOD_UPD_CNF)
				return $ctl->renderFoodUpdateConfirm();

				if ($_POST["action"] == ACT_A_FOOD_UPD_SAVE)
				return $ctl->renderFoodUpdSave();
			case UC_FOOD_DEL:
				$ctl = new FoodListController();
				if ($_POST["action"] == ACT_A_FOOD_DELETE)
				return $ctl->renderFoodDelete();

				// manage meal
			case UC_A_MEAL:
				$ctl = new MealPlanController();
				if ($_POST["action"] == ACT_A_MEAL)
				return $ctl->renderMealPlanShow();

				if ($_POST["action"] == ACT_A_MEAL_ADD)
				return $ctl->renderMealAdd();

				if ($_POST["action"] == ACT_A_MEAL_ADD_CNF)
				return $ctl->renderMealAddConfirm();

				if ($_POST["action"] == ACT_A_MEAL_ADD_SAVE)
				return $ctl->renderMealAddSave();
				
				if($_POST["action"] == ACT_A_MEAL_SEARCH)
				return $ctl->renderMealSearch();

			case UC_MEAL_EDT:
				$ctl = new MealPlanController();
				if ($_POST["action"] == ACT_A_MEAL_EDIT)
				return $ctl->renderMealEdit();

				if ($_POST["action"] == ACT_A_MEAL_UPD_CNF)
				return $ctl->renderMealUpdConfirm();

				if ($_POST["action"] == ACT_A_MEAL_UPD_SAVE)
				return $ctl->renderMealUpdSave();

			case UC_MEAL_DEL:
				$ctl = new MealPlanController();
				if ($_POST["action"] == ACT_A_MEAL_DELETE)
				return $ctl->renderMealDelete();

				// choose package
			case UC_START:
				$ctl = new StartController();
				if ($_POST["action"] == ACT_START)
				return $ctl->renderStart();

			case UC_CHOOSE_PACKAGE:
				$ctl = new PackageConroller();
				if ($_POST["action"] == ACT_CHOOSE_PACKAGE)
				return $ctl->savePackageConfirm();

				if ($_POST["action"] == ACT_PACKAGE_SAVE)
				return $ctl->savePackage();

				if ($_POST["action"] == ACT_PACKAGE_CANCEL)
				return $ctl->savePackageCancel();

				// admin update profie
			case UC_ADMIN_UPDATE_PROFILE:
				$ctl = new AdminUpdateProfileController();
				if ($_POST["action"] == ACT_ADMIN_UPDATE_PROFILE)
				return $ctl->renderAdminUpdateProfile();

				// admin update profie cancel
				if ($_POST["action"] == ACT_ADMIN_UPDATE_PROFILE_CANCEL)
				return $ctl->renderAdminProfileCancel();

				// category
			case UC_A_CAT:
				$ctl = new CategoryController();
				if ($_POST["action"] == ACT_A_CAT)
				return $ctl->renderCategoryShow();

				if ($_POST["action"] == ACT_A_CAT_ADD)
				return $ctl->renderCategoryAdd();

				if ($_POST["action"] == ACT_A_CAT_ADD_CNF)
				return $ctl->renderCategoryAddConfirm();

				if ($_POST["action"] == ACT_A_CAT_ADD_SAVE)
				return $ctl->renderCategoryAddSave();
			case UC_CAT_EDT:
				$ctl = new CategoryController();
				if ($_POST["action"] == ACT_A_CAT_EDIT)
				return $ctl->renderCategoryEdit();

				if ($_POST["action"] == ACT_A_CAT_UPD_CNF)
				return $ctl->renderCategoryUpdConfirm();

				if ($_POST["action"] == ACT_A_CAT_UPD_SAVE)
				return $ctl->renderCategoryUpdSave();
			case UC_CAT_DEL:
				$ctl = new CategoryController();
				if ($_POST["action"] == ACT_A_CAT_DELETE)
				return $ctl->renderCategoryDelete();

				// package history
			case UC_PACKAGE_HISTORY:
				$ctl = new PackageHistoryController();
				if ($_POST["action"] == ACT_PACKAGE_LIST)
				return $ctl->renderPackageHistory();

			case UC_PAK_HIS_RESULT:
				$ctl = new PackageHistoryController();
				if ($_POST["action"] == ACT_PAK_HIS_RESULT)
				return $ctl->renderPackageHistoryResult();
		}
	}
}