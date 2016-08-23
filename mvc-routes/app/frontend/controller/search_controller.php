<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/16/2016
 * Time: 10:16 AM
 */
class search_controller extends base_controller
{
    public function view(){
        $limit = 5;
        $this->loadModel('search');
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        if (isset($_GET['title'])) {
            $all_post = count($this->model->getAllSearch($_GET['title'],$page));
            $total_page = ceil($all_post / $limit);
            $result = $this->model->getSearch($_GET['title'],$page);
        } else {
            header("Location:".BASE_PATH);
        }
        $this->loadView('search',array(
            "result"=>$result,
            "total_page"=>$total_page,
            "current_page"=>$page,
            "limit"=>$limit,
            "title"=>"Có ". $all_post." kết quả tìm kiếm từ khóa : 	",
            "description"=>"&ldquo;".$_GET['title']."&rdquo;"
        ));
    }
}