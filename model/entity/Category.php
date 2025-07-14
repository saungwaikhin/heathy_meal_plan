<?php
class Category{
    private $cat_id;
    private $cat_name;
    
    public function getId(){
        return $this->cat_id;
    }
    public function setId($cat_id){
        $this->cat_id = $cat_id;
    }
    
    public function getName(){
        return $this->cat_name;
    }
    public function setName($catname){
        $this->cat_name = $catname;
    }
}