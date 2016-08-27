<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 10:53 AM
 */
class login_admin_model extends base_model
{
    private $table = 'user';
    public function checkConfirm($name){
        $sql = " SELECT confirmed FROM " . $this->table . " WHERE name = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $name);
            $result = $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if($result == 1){
            return true;
        }else{
            return false;
        }
    }
    
    public function checkLogin($user, $pass)
    {
        $sql = " SELECT  password FROM " . $this->table . " WHERE name = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $user);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }






        $hash = $this->stmt->fetch()['password'];

        if ($hash) {

            if (password_verify($pass, $hash)) {
                return true;
              
            } else {
                return false;
            }

        } else {
            return false;
        }
    }
    public function getIdByName($name){
        return parent::getByName('user',$name,'name');
    }

}