<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/27/2016
 * Time: 9:47 AM
 */
class password_admin_model extends base_model
{
    public function checkEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = :user_email";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":user_email", $email);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if ($this->stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = :user_email";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":user_email", $email);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->stmt->fetch();
    }

    public function updateConfirmCode($confirm_code, $id)
    {
        $sql = "UPDATE users SET confirm_code = ? WHERE id = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $confirm_code);
            $this->stmt->bindParam(2, $id);
            $result = $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkConfirm($id)
    {
        $sql = "SELECT CONFIRMED FROM USERS WHERE id = ? ";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $id);
            $result = $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataByConfirmCode($confirm_code)
    {
        return parent::getByName("users", $confirm_code, "confirm_code");
    }

    public function updatePass($id,$password)
    {
        $sql = "UPDATE USERS SET USER_PASS = ? WHERE ID = ?";
        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$password);
            $this->stmt->bindParam(2,$id);
            $result = $this->stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
}