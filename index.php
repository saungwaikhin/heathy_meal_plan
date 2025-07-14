<?php
include 'config/define.php';
include 'config/config.php';

include 'controller/FrontController.php';
include 'controller/WelcomeController.php';
include 'controller/HomeController.php';
include 'controller/LoginController.php';
include 'controller/RegistrationController.php';

include 'controller/UpdateUserProfileController.php';
include 'controller/_file_upload.php';

include 'controller/RecordUpdateController.php';
include 'controller/DaliyFoodPlanController.php';
include 'controller/StartController.php';
include 'controller/ForgetPasswordController.php';

//Admin controller
include 'controller/AdminRecordUserListController.php';
include 'controller/AdminUserRecordDailyFoodController.php';
include 'controller/PackageConroller.php';
include 'controller/PackageHistoryController.php';
include 'controller/FoodListController.php';

include 'controller/MealPlanController.php';
include 'controller/AdminUpdateProfileController.php';
include 'controller/CategoryController.php';

include 'view/View.php';
include 'view/ViewLogin.php';
include 'view/WelcomeView.php';
include 'view/LoginView.php';

include 'view/user/HomeView.php';

include 'view/user/RegisterEditView.php';
include 'view/user/RegisterConfirmView.php';
include 'view/user/RegisterSaveView.php';

include 'view/user/UpdateUserProfileEditView.php';
include 'view/user/UpdateProfileConfirmView.php';
include 'view/user/updateProfileSaveView.php';

include 'view/user/RecordUpdateEditView.php';
include 'view/user/RecordUpdateConfirmView.php';
include 'view/user/RecordUpdateSaveView.php';

include 'view/user/DailyFoodPlanView.php';
include 'view/user/DailyFoodPlanSaveView.php';
include 'view/user/DailyFoodPlanDoneSaveView.php';
include 'view/user/PackageStartView.php';
include 'view/user/PackageConfirmView.php';
include 'view/user/PackageHistoryView.php';
include 'view/user/PackageExistView.php';

include 'view/user/ForgetPasswordView.php';
include 'view/user/ForgetPasswordCodeView.php';
include 'view/user/ForgetPasswordConfirmView.php';


//Admin view
include 'view/admin/AdminHomeView.php';
include 'view/admin/AdminUserRecordListView.php';
include 'view/admin/AdminUserRecordBMIView.php';
include 'view/admin/AdminUpdateProfileEditView.php';

include 'view/admin/AdminUserRecordDailyFoodView.php';
include 'view/admin/AdminUserRecordDailyFoodDetailView.php';

include 'view/admin/AdminPackageView.php';
include 'view/admin/AdminPackageAddView.php';
include 'view/admin/AdminPackageConfirmView.php';
include 'view/admin/AdminPackageSaveView.php';
include 'view/admin/AdminPackageEditView.php';
include 'view/admin/AdminPackageEditConfirmView.php';
include 'view/admin/AdminPackageEditSaveView.php';

include 'view/admin/AdminFoodListView.php';
include 'view/admin/AdminFoodAddView.php';
include 'view/admin/AdminFoodListConfirmView.php';
include 'view/admin/AdminFoodListSaveView.php';
include 'view/admin/AdminFoodListEditView.php';
include 'view/admin/AdminFoodListEditConfirmView.php';
include 'view/admin/AdminFoodListEditSaveView.php';
include 'view/admin/AdminFoodListSearchView.php';

include 'view/admin/AdminBmiView.php';
include 'view/admin/AdminMealAddView.php';
include 'view/admin/AdminMealPlanView.php';
include 'view/admin/AdminMealConfirmView.php';
include 'view/admin/AdminMealSaveView.php';
include 'view/admin/AdminMealEditView.php';
include 'view/admin/AdminMealEditConfirmView.php';
include 'view/admin/AdminMealEditSaveView.php';
include 'view/admin/AdminMealPlanSearchView.php';


include 'view/admin/AdminUserRecordPackageView.php';
include 'view/admin/AdminUserRecordDailyFood.php';

include 'view/admin/AdminCategoryView.php';
include 'view/admin/AdminCategoryConfirmView.php';
include 'view/admin/AdminCategorySaveView.php';
include 'view/admin/AdminCategoryEditView.php';
include 'view/admin/AdminCategoryEditConfirmView.php';
include 'view/admin/AdminCategoryEditSaveView.php';

//DAO
include 'model/dao/DAO.php';
include 'model/dao/UserDao.php';
include 'model/dao/RecordDao.php';
include 'model/dao/DailyFoodPlanDao.php';
include 'model/dao/ChoosePackageDao.php';
include 'model/dao/CategoryDao.php';
include 'model/dao/PackageDao.php';
include 'model/dao/FoodListDao.php';
include 'model/dao/MealPlanDao.php';

//entity
include 'model/entity/User.php';
include 'model/entity/Category.php';
include 'model/entity/Food.php';
include 'model/entity/Package.php';
include 'model/entity/UserRecord.php';
include 'model/entity/MealPlan.php';

include 'phpmailer/PHPMailerAutoload.php';

session_cache_limiter("none");
session_start();

$controller=new FrontController();
$page=$controller->execute();
$page->display();