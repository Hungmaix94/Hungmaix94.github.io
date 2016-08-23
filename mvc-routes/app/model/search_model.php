<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/16/2016
 * Time: 10:20 AM
 */
class search_model extends base_model
{
    public  function getSearch($get,$page = 1){
        $limit=5;
        $search="%".$get."%";
//
        $sql = "SELECT * FROM posts p INNER JOIN users u ON p.user_ID = u.id WHERE title LIKE ?";
        $sql .="LIMIT ".($page-1)*$limit.",".$limit;
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1,$search,PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }
    public  function getAllSearch($get){
       
        $search="%".$get."%";
//
        $sql = "SELECT * FROM posts p INNER JOIN users u ON p.user_ID = u.id WHERE title LIKE ?";

        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1,$search,PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }
}