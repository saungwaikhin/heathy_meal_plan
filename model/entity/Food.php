<?php
class Food{
    private $food_id;
    private $food_name;
    private $cat_id;
    private $food_desc;
    
    public function getId(){
        return $this->food_id;
    }
    public function setId($food_id){
        $this->food_id = $food_id;
    }
    
    public function getName(){
        return $this->food_name;
    }
    public function setName($foodname){
        $this->food_name = $foodname;
    }
    
    public function getCatId(){
        return $this->cat_id;
    }
    public function setCatId($cat_id){
        $this->cat_id = $cat_id;
    }
    
    public function getDescription(){
        return $this->food_desc;
    }
    public function setDescription($food_desc){
        $this->food_desc = $food_desc;
    }
}