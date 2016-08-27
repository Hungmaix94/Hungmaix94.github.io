<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 3:39 PM
 */
class register_admin_model extends base_model
{
    function checkExist($username, $email)
    {
        $sql = "SELECT * FROM user  WHERE ( name = ? OR email = ? )";

        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $username);
            $this->stmt->bindParam(2, $email);
            $result = $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if ($this->stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }


    function checkVerify($confirm_code)
    {

//        echo"<pre>"; var_dump($confirm_code); echo "</pre>";exit();
        $sql ="UPDATE user SET confirmed = 1, confirm_code = '' WHERE confirm_code = ?";
        try{
            $this->stmt =  $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$confirm_code);
            $this->stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
//        echo"<pre>"; var_dump($this->stmt->rowCount()>0); echo "</pre>";exit();
        if($this->stmt->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    function add($name, $password, $email)
    {
//        1 la đã confirm 0 là chưa
        $confirmed = 0;
        $confirm_code = md5($name . $email);

        $sql = "INSERT INTO user (name,password,email,confirmed,confirm_code)
                VALUES (:name,:password,:email,:confirmed,:confirm_code)
        ";
        try {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":name", $name);
            $this->stmt->bindParam(":password", $password);
            $this->stmt->bindParam(":email", $email);
            $this->stmt->bindParam(":confirmed", $confirmed);
            $this->stmt->bindParam(":confirm_code", $confirm_code);
            $result = $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if ($this->conn->lastInsertId()) {
            return true;
        } else {
            return false;
        }

    }

    function getDataByName($name)
    {
        return parent::getByName("user", $name, "name");
    }


}