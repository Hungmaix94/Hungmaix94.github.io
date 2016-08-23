<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 3:02 PM
 */
class dashboard_admin_model extends base_model
{

    public function getEmailAdmin($id){
        $sql ="SELECT user_email FROM users WHERE id = ?";
        try{
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$id,PDO::PARAM_INT);
            $this->stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $this->stmt->fetch();
    }
    public function getTotalPosts()
    {
        return count($this->getAll('posts'));

    }

    public function getTotalUsers(){
        return count($this->getAll('users'));
    }
//    LAY 10 BAI VIET SAP XEP THEO NGAY VIET
    public function getNewestPosts($limit = 10){
        $sql = "SELECT posts.*, users.user_name, categories.category_name
                FROM posts
                INNER JOIN users ON users.id = posts.user_ID
                INNER JOIN categories ON categories.id = posts.category_ID
                ORDER BY posts.created_time DESC
                LIMIT ?
        ";

        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$limit,PDO::PARAM_INT);
            $this->stmt->execute();
        } catch(PDOException $e){
            die($e->getMessage());
        }
        return $this->stmt->fetchAll();
    }


}