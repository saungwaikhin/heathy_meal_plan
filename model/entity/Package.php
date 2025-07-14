<?php
class Package{
    private $package_id;
    private $package_name;
    private $package_type;
    private $package_desc;
    
    public function getId(){
        return $this->package_id;
    }
    public function setId($package_id){
        $this->package_id = $package_id;
    }
    
    public function getName(){
        return $this->package_name;
    }
    public function setName($package_name){
        $this->package_name = $package_name;
    }
    
 public function getType(){
        return $this->package_type;
    }
    public function setType($package_type){
        $this->package_type = $package_type;
    }
    
 public function getDescription(){
        return $this->package_desc;
    }
    public function setDescription($package_desc){
        $this->package_desc = $package_desc;
    }
}