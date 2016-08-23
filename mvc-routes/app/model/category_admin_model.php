<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/18/2016
 * Time: 11:23 AM
 */
class category_admin_model extends base_model
{
    public function getAllCategory()
    {
        return parent::getAll("categories");
    }
    public function checkCategoryName($category_name){
        $sql = "SELECT  category_name FROM categories WHERE category_name = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$category_name);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
//        echo"<pre>"; var_dump($result); echo "</pre>";exit();

        if($this->stmt->rowCount()>0){
       
            return true;
        }else{
            return false;
        }
    }
    public function getPostByCategoryId($id)
    {
        $sql = "SELECT p.*, u.user_name,c.category_name FROM posts p 
           INNER JOIN users u ON u.id = p.user_ID
           INNER JOIN categories c ON c.id = p.category_ID
           WHERE category_ID = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $id, PDO::PARAM_INT);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->stmt->fetchAll();
    }
    public function updatePostDeleteCategory($category_id)
    {
        $sql = "UPDATE posts SET category_ID = 8 WHERE category_ID = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $category_id);
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
    public function getCategoryById($id){
        return parent::getById("categories",$id);
    }
    public function updateCategory($category_name,$id){
         $sql = "UPDATE categories SET category_name = :category_name WHERE id = :id";
        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":category_name",$category_name);
            $this->stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $result = $this->stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        if ($result){
            return true;
        }else{
            return false;
        }

    }
    public function insertCategory($category_name){
        $sql = "INSERT INTO categories(category_name) VALUES (:category_name)";
        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam("category_name",$category_name);
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