<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:35 PM
 */
class post_controller extends base_controller
{
    public function view($param = null)
    {
       
        //load view nao
        $this->loadModel('index');
//        tat ca bai viet
        $limit = 5;
        $all_post = count($this->model->getAll());
//       tong so trang
        $total_page = ceil($all_post / $limit);
//        kiểm tra tổng số trang lớn hơn 1 mới phân trang
        if($total_page>1){
            
        }
        if (empty($param)) {
            $page  = isset($_GET['page']) ? $_GET['page'] : 1;
            $this->loadModel('post');
            $result = $this->model->getDataByPage($page);
            //              xu ly o cho co param truoc
            $this->loadView('post', array(
                'data'=>$result,
                'title'=>"Danh sách bài viết của tôi",
                'description' => "Chia sẻ kinh nghiệm về lập trình.",
                'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
                'total_page' => $total_page
            ));
        } else {
            $this->loadModel('post');
            $result = $this->model->getDataById($param);
            //              xu ly o cho co param truoc
            $this->loadView('detail_post', array(
                'data'=>$result,
                'title'=>"Danh sách bài viết",
                'description' => "Chia sẻ kinh nghiệm về lập trình.",
                'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
                'total_page' => $total_page
            ));
        }
    }


    public function index()
    {
//        $this->loadView
    }
}