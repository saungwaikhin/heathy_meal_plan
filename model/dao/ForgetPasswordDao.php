<?php
class ForgetPasswordDao extends DAO{
    public function getForgetPassword($email){
        
        $sql="select * from user where email=:email";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":email",$email);
        $result=$this->executeQuery();
        return $result;
        
        
    }
    public function saveCode($code,$email){
        
        $sql="update user set code=:code where email=:email";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":code", $code);
        $this->bindQueryParam(":email",$email);
        $this->beginTrans();
        $result=$this->executeUpdate();
        if($result) $this->commitTrans();
        else $this->rollbackTrans();
        
    }
    
    public function updateForgetPassword($password,$email){
        $sql="update user set password=:password where email=:email";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":password",$password);
        $this->bindQueryParam(":email",$email);
        $this->beginTrans();
        $result=$this->executeUpdate();
        if($result) $this->commitTrans();
        else $this->rollbackTrans();
        
        //$_SESSION["loginUser"]=$_SESSION["update_user"];
        
    }

}
