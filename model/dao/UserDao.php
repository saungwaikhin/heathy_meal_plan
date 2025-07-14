<?php

class UserDao extends DAO
{

    public function getUserByUserName($userName)
    {
        $sql = "select * from user where username=:username";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":username", $userName);
        $result = $this->executeQuery();
        
        return $result;
    }
    public function getUserIdByUserName($userName)
    {
        $sql = "select * from user where name=:username";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":username", $userName);
        $result = $this->executeQuery();
        
        return $result;
    }

    public function saveUser()
    {
        echo "Saving";
        // echo "Hash value=".md5($_SESSION["reg_user"]->getPassword());
        $sql = "insert into user values(null,:username,:password,:name,:dob,:gender,:email,:phone,null,null,null,null)";
        
        $this->openDB();
        $this->prepareQuery($sql);
        
        $this->bindQueryParam(":username", $_SESSION["reg_user"]->getUserName());
        $this->bindQueryParam(":password", md5($_SESSION["reg_user"]->getPassword()));
        $this->bindQueryParam(":name", $_SESSION["reg_user"]->getName());
        $this->bindQueryParam(":dob", $_SESSION["reg_user"]->getDoB());
        $this->bindQueryParam(":gender", $_SESSION["reg_user"]->getGender());
        $this->bindQueryParam(":email", $_SESSION["reg_user"]->getEmail());
        $this->bindQueryParam(":phone", $_SESSION["reg_user"]->getPhone());
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if ($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
        
        echo "Saved";
        if (isset($_SESSION["reg_user"]))
            unset($_SESSION["reg_user"]);
    }

    public function updateUser()
    {
        // $sql="update user set name=:name,password=:password,dob=:dobgender=:gender,memail=:email,phone=:phone where id=:id";
        $sql = "update user set name=:name,password=:password,email=:email,phone=:phone where user_id=:id";
        $this->openDB();
        $this->prepareQuery($sql);
        
        // $this->bindQueryParam(":username", $_SESSION["update_user"][0]["username"]);
        
        $this->bindQueryParam(":name", $_SESSION["update_user"][0]["name"]);
        $this->bindQueryParam(":password", $_SESSION["update_user"][0]["password"]);
        // $this->bindQueryParam(":dob", $_SESSION["update_user"][0]["dob"]);
        // $this->bindQueryParam(":gender", $_SESSION["update_user"][0]["gender"]);
        $this->bindQueryParam(":email", $_SESSION["update_user"][0]["email"]);
        $this->bindQueryParam(":phone", $_SESSION["update_user"][0]["phone"]);
        $this->bindQueryParam(":id", $_SESSION["update_user"][0]["user_id"]);
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if ($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
        
        $_SESSION["loginUser"] = $_SESSION["update_user"];
    }

    public function updateProfilePhoto()
    {
        // print_r($_SESSION["loginUser"][0]["user_id"]);
        // print_r($_SESSION["photo"]);
        $sql = "update user set photo=:photo where user_id=:id";
        
        $this->openDB();
        $this->prepareQuery($sql);
        
        $this->bindQueryParam(":photo", @ $_SESSION['photo']);
        $this->bindQueryParam(":id", $_SESSION["loginUser"][0]["user_id"]);
        
        $this->beginTrans();
        $result = $this->executeUpdate();
        
        if ($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
        
        $_SESSION["loginUser"][0]["photo"] = @$_SESSION["photo"];
    }

    public function getUserPhoto()
    {
        // $_SESSION["loginUser"][0]["photo"]=$_SESSION["upload"];
        $sql = "SELECT photo FROM user WHERE user_id=:id";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":id", $_SESSION["loginUser"][0]["user_id"]);
        $this->beginTrans();
        $result = $this->executeUpdate();
        // return $result;
    }

    public function getForgetPassword($email)
    {
        $sql = "select * from user where email=:email";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":email", $email);
        $result = $this->executeQuery();
        return $result;
    }

    public function saveCode($code, $email)
    {
        $sql = "update user set code=:code where email=:email";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":code", $code);
        $this->bindQueryParam(":email", $email);
        $this->beginTrans();
        $result = $this->executeUpdate();
        if ($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
    }

    public function updateForgetPassword($password, $email)
    {
        $sql = "update user set password=:password where email=:email";
        
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":password", $password);
        $this->bindQueryParam(":email", $email);
        $this->beginTrans();
        $result = $this->executeUpdate();
        if ($result)
            $this->commitTrans();
        else
            $this->rollbackTrans();
        
        // $_SESSION["loginUser"]=$_SESSION["update_user"];
    }

    /* Home User */
    public function getBmitHere()
    {
        $id = $_SESSION["loginUser"][0]['user_id'];
        // echo $id;
        $sql = "SELECT bmi_result FROM user WHERE user_id=:id";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":id", $id);
        $result = $this->executeQuery();
        return $result;
    }

    /* Home Admin */
    
	public function getAllUser()
    {
        $sql = "SELECT * FROM user";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return $result;
    }
    
    public function getAllCount()
    {
        $sql = "SELECT * FROM user";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return count($result);
    }

	public function getActiveCount()
    {
        $sql = "SELECT * FROM user WHERE bmi_result>0";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return count($result);
    }

    public function getUnderCount()
    {
        $sql = "SELECT bmi_result FROM user WHERE bmi_result<18.5";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return count($result);
    }

    public function getNormalCount()
    {
        $sql = "SELECT bmi_result FROM user WHERE bmi_result>18.5 and bmi_result<24.9";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return count($result);
    }

    public function getOverCount()
    {
        $sql = "SELECT bmi_result FROM user WHERE bmi_result>25";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return count($result);
    }

    // For admin user record
    public function getUserRecord()
    {
        $sql = "select user_id,name,dob,gender,email,phone from user";
        
        $this->openDB();
        $this->prepareQuery($sql);
        
        $result = $this->executeQuery();
        
        return $result;
    }

    public function getAllRecordByRows($start, $no_of_record)
    {
        $sql = "select * from user limit $start,$no_of_record ";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return $result;
    }

    public function getAllBmiByUser($id)
    {
        $sql = "select * from record where user_id=$id order by updated_date desc";
        $this->openDB();
        $this->prepareQuery($sql);
        $result = $this->executeQuery();
        return $result;
    }
}