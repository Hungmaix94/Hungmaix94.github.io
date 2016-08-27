<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/20/2016
 * Time: 2:36 PM
 */
class user_admin_model extends base_model
{
    public function getAllUser()
    {
        return parent::getAll("users");
    }

    public function updatePostDeleteUser($user_id)
    {
        $sql = "UPDATE posts
              SET user_ID = 3
              WHERE user_id = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $user_id, PDO::PARAM_INT);
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

    public function getUserById($id)
    {
        return parent::getById("users", $id);
    }

    public function insertUser()
    {
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $target_file = basename($_FILES["fileToUpload"]["name"]);

        $created_time = date('y-m-d');
        $sql = "INSERT INTO USERS(user_name,user_email,user_pass,created_time,img_admin) 
                VALUES (?,?,?,?,?)";
        try{
            $this->stmt =  $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$_POST['username']);
            $this->stmt->bindParam(2,$_POST['email']);
            $this->stmt->bindParam(3,$password);
            $this->stmt->bindParam(4,$created_time);
            $this->stmt->bindParam(5,$target_file );
            $result = $this->stmt->execute();
        }catch (PDOException $e){
            die($e->getMessage());
        }
        if($result){
            return true;

        }else{
            return false;
        }
    }
}