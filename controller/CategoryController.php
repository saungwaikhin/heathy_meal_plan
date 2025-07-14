<?php
class CategoryController{
	public function renderCategoryShow(){
		$limit_no_of_record = 4;
	    $catDao = new CategoryDao();
	    $no_of_all_records = count($catDao->getAllCategory());//total no of records
	    //print_r($no_of_all_records);
	    $maxpage = ceil($no_of_all_records/$limit_no_of_record);//total page
	    
	    if(@$_GET["page"]<1)
	        $page =1;
	    elseif($_GET["page"]>$maxpage)
	       $page = $maxpage;
	    else 
	        $page = $_GET["page"];
	    $_SESSION["page"] = $page;
	    $start_from = ($page-1)*4;
	    //echo $start_from;
	    $catbylimit = $catDao->getAllCatByRows($start_from, $limit_no_of_record);
	    
		return new AdminCategoryView($catbylimit, $no_of_all_records, $start_from);
	}
	
	public function renderCategoryAdd(){
		return new AdminCategoryView();
	}
	
	public function renderCategoryAddConfirm(){
		$catName = $_POST["catName"];
	
		if($catName == "")
			$errors["name_null"] = "Please Enter Category Name";
		elseif($catName!=""){
			$categorydao = new CategoryDao();
			$category = $categorydao->getCatByCatName();
			if(!empty($category)){
				$errors["name_exist"] = "Category Name Already Exit";
				return new AdminCategoryView($errors);
			}
		}

		if (!empty($errors))
			return new AdminCategoryView($errors);	
			
		if (empty($errors)){
			$category = new Category();
			$category->setName($catName);
			
		//	print_r($_SESSION["category"]);
			$_SESSION["category"] = $category;
			return  new AdminCategoryConfirmView();
		}
	
	}
	public function renderCategoryAddSave(){
		$categorydao = new CategoryDao();	
		$categorydao->saveCategory();
		return new AdminCategorySaveView();
	}
	
//category edit	
	public function renderCategoryEdit(){
		return new AdminCategoryEditView();
	}
	
	public function renderCategoryUpdConfirm(){
		$updcatId = $_POST["catId"];
		$updcatName = $_POST["updCatName"];
		
		if($updcatName == "")
			$errors["name_null"] = "Please Enter Food Name";
			
		if(!empty($errors))
			return new AdminCategoryEditView($errors);
		if (empty($errors)){
			$update_category = new Category();
			$update_category->setId($updcatId);
			$update_category->setName($updcatName);
			$_SESSION["update_category"] = $update_category;
			return new AdminCategoryEditConfirmView();
		}
	}
	
	public function renderCategoryUpdSave(){
		$categorydao = new CategoryDao();
		$categorydao->updateSaveCategory();
		
		return new AdminCategoryEditSaveView();
	}
public function renderCategoryDelete(){
		$categorydao= new CategoryDao();
		$categorydao->deleteCategory();
		
	    return new AdminCategoryView();
	}

}