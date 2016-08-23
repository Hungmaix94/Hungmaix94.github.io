<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/9/2016
 * Time: 3:16 PM
 */
class post_model extends base_model
{
    private $table = "posts";

    public function getDataById($id)
    {
        $sql = "SELECT p.*,users.user_name 
                FROM posts p 
                INNER JOIN users ON users.id= p.user_ID
                INNER JOIN categories ON categories.id = p.category_ID
                WHERE p.id = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $id, PDO::PARAM_INT);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->stmt->fetch();
    }
    public function getTotalPost(){
//        $sql
    }
    public function getAllData()
    {
        $sql = "SELECT p.*,u.user_name, categories.category_name 
              FROM posts p
              INNER JOIN users u ON p.user_ID = u.id
              INNER JOIN categories ON categories.id= p.category_ID
              ORDER BY p.id ASC";

        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->stmt->fetchAll();
    }

    public function getDataByPage($page = 1)
    {
        $limit = 5;

        $sql = "SELECT posts.*,users.user_name,categories.category_name
              FROM posts
              INNER JOIN users ON users.id = posts.user_ID
              INNER JOIN categories ON categories.id = posts.category_ID
              ORDER BY posts.id
              LIMIT " . ($page - 1) * $limit . "," . $limit;

        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
        } catch (PDOException $e) {
            echo "<pre>";
            var_dump(die($e->getMessage()));
            echo "</pre>";
            exit();
        }
        return $this->stmt->fetchAll();
    }
}