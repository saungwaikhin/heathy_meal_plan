<?php
define("UC_WELCOME", "welcome");
define("ACT_WELCOME", "welcome page");

//home
define("UC_HOME", "user home");
define("ACT_HOME", "user home page");

//register
define("UC_REG", "register");
define("ACT_REG_EDT", "register edit");
define("ACT_REG_CNF","register confirm");
define("ACT_REG_SAVE", "register save");

//Login
define("UC_LOGIN", "login");
define("ACT_LOGIN_FIRST", "login first");
define("ACT_LOGIN_CHK", "login check");
//forget password
define("UC_FORGET_PASS", "forget password");
define("ACT_FORGET_PASS", "forget password action");
define("ACT_FORGET_PASS_CODE", "forget passwodrd code action");
define("ACT_FORGET_PASS_CNF", "forget password code confirm");
define("ACT_FORGET_PASS_SAVE", "forget password save");
//LogOut
define("UC_LOGOUT", "logout");
define("ACT_LOGOUT", "logout action");

//User Record
define("UC_RECORD","record");
define("ACT_RECORD","record action");

//Update user profile
define("UC_UPD_PROFILE", "update profile");
define("ACT_UPD_PROFILE_EDT", "update profile edit");
define("ACT_UPD_PROFILE_CNF", "update profile confirm action");
define("ACT_UPD_PROFILE_SAVE", "update profile save action");
define("UC_FILE", "file upload");
define("ACT_FILE_UPLOAD", "file upload action");
define("ACT_FILE_UPLOAD_DOWNLOAD", "file upload action download");
define("ELEMENT","upload");
define("ACT_UPD_PROFILE_UPLOAD", "user profile photo upload");

//user record update
define("UC_UPDATE_RECORD","record update");
define("ACT_UPDATE_RECORD", "record update action");
define("ACT_UPDATE_RECORD_CHK", "record update check");
define("ACT_UPDATE_RECORD_SAVE", "record update save");
define("ACT_UPDATE_RECORD_BACK", "record update back");
define("ACT_UPDATE_RECORD_CANCEL", "record update cancel");

//daily food plan
define("UC_START", "package start");
define("ACT_START", "package start action");
define("UC_CHOOSE_PACKAGE", "choose package");
define("ACT_CHOOSE_PACKAGE", "choose choosepackage action");
define("ACT_PACKAGE_SAVE", " choosepackage save confirm");
define("ACT_PACKAGE_CANCEL", "choosepackage save cancel");



define("UC_PACKAGE_HISTORY", "package history");
define("ACT_PACKAGE_LIST", "package history action");
define("ACT_PACKAGE_HIS_START", "package history start");

define("UC_PAK_HIS_RESULT", "package history result");
define("ACT_PAK_HIS_RESULT","package history result action");

define("UC_DAILY_FOOD_PLAN", "daily food plan");
define("ACT_DALIY_FOOD_PLAN_SHOW", "daily food plan show");
define("ACT_DALIY_FOOD_PLAN_CHECKED", "daily food plan checked");
define("ACT_DALIY_FOOD_PLAN_REQUEST", "daily food plan request");
define("ACT_DALIY_FOOD_PLAN_REQUEST_NEXT_DAY", "daily food plan request next day");
define("UC_DAILY_FOOD_PLAN_BY_DAY", "daily food plan by day");
define("ACT_DAILY_FOOD_PLAN_BY_DAY", "daily food plan by day action");
define("ACT_DALIY_FOOD_PLAN_DONE", "daily food plan Done action");
define("ACT_DALIY_FOOD_PLAN_DONE_SAVE", "daily food plan Done save action");
define("ACT_DALIY_FOOD_PLAN_Back", "daily food plan Done back");

//Admin
//home
define("UC_A_HOME", "admin home");
define("ACT_A_HOME", "admin home page");
//Login
define("UC_LOGIN_ADMIN", "login");
//define("ACT_LOGIN_FIRST", "login first");
define("ACT_LOGIN_ADMIN_CHK", "login admin check");

//view record list
define("UC_A_RECORD_USER_LIST", "record user list");
define("ACT_A_RECORD_USER_LIST", "record user list action");

//user record daily food
define("UC_A_DAILY_FOOD_USER", "record user daily food");
define("ACT_A_DAILY_FOOD_USER", "record user daily food action");
define("UC_A_DAILY_FOOD_DETAIL", "record user daily food detail");
define("ACT_A_DAILY_FOOD_DETAIL", "record user daily food detail action");

define("UC_A_RECORD_USER", "record user");
define("ACT_A_RECORD_USER", "record user action");
define("UC_A_RECORD_USER_BMI", "record user bmi");
define("ACT_A_RECORD_USER_BMI", "record user bmi action");
define("ACT_A_RECORD_USER_PACKAGE", "record user package action");
define("ACT_A_RECORD_USER_DAILY_FOOD", "record user daily food");
define("ACT_A_RECORD_USER_SEARCH", "record user search action");

//package
define("UC_A_PACKAGE", "package");
define("ACT_A_PACKAGE", "package action");
define("ACT_A_PACKAGE_ADD", "package add");
define("ACT_A_PACKAGE_ADD_CNF", "package add confirm");
define("ACT_A_PACKAGE_ADD_SAVE", "package add save");

define("UC_PACKAGE_EDIT", "package edit");
define("ACT_A_PACKAGE_EDIT", "package edit action");
define("ACT_A_PACKAGE_UPD_CNF", "package update confirm");
define("ACT_A_PACKAGE_UPD_SAVE", "package update save");

define("UC_PACKAGE_DELETE", "package delete");
define("ACT_A_PACKAGE_DELETE", "package delete action");
//admin package user
define("UC_A_PACKAGE_USER", "admin view user package history");
define("ACT_A_PACKAGE_USER", "admin view user package history action");
//food list
define("UC_A_FOOD", "food list");
define("ACT_A_FOOD", "food list action");
define("ACT_A_FOOD_ADD", "food add");
define("ACT_A_FOOD_ADD_CNF", "food add confirm");
define("ACT_A_FOOD_ADD_SAVE", "food add save");
define("UC_FOOD_EDT", "food edit");
define("ACT_A_FOOD_EDIT", "food edit action");
define("ACT_A_FOOD_UPD_CNF", "food update confirm");
define("ACT_A_FOOD_UPD_SAVE", "food update save");
define("UC_FOOD_DEL", "food delete");
define("ACT_A_FOOD_DELETE", "food delete action");
define("ACT_A_FOOD_SERACH", "food search");

//bmi
define("UC_A_BMI", "BMI");
define("ACT_A_BMI", "BMI action");

//meal plan
define("UC_MEAL_EDT", "meal plan edit");
define("UC_MEAL_DEL", "meal plan delete");
define("ACT_A_MEAL_SEARCH", "meal search");
define("UC_A_MEAL", "meal plan");
define("ACT_A_MEAL", "meal plan action");
define("ACT_A_MEAL_ADD", "meal plan add action");
define("ACT_A_MEAL_ADD_CNF", "meal add confirm");
define("ACT_A_MEAL_ADD_SAVE", "meal add save");
define("ACT_A_MEAL_EDIT", "meal edit");
define("ACT_A_MEAL_UPD_CNF", "meal update confirm");
define("ACT_A_MEAL_UPD_SAVE", "meal update save");
define("ACT_A_MEAL_DELETE", "meal delete");
//Admin profile update
define("UC_ADMIN_UPDATE_PROFILE", "admin profile update");
define("ACT_ADMIN_UPDATE_PROFILE", "action admin profile update");
define("ACT_ADMIN_UPDATE_PROFILE_CANCEL","action admin profile cancel");
//category
define("UC_A_CAT", "category");
define("ACT_A_CAT", "category action");
define("ACT_A_CAT_ADD", "category add");
define("ACT_A_CAT_ADD_CNF", "category add confirm");
define("ACT_A_CAT_ADD_SAVE", "category add save");

define("UC_CAT_EDT", "category edit");
define("ACT_A_CAT_EDIT", "category edit action");
define("ACT_A_CAT_UPD_CNF", "category update confirm");
define("ACT_A_CAT_UPD_SAVE", "category update save");

define("UC_CAT_DEL", "category delete");
define("ACT_A_CAT_DELETE", "category delete action");