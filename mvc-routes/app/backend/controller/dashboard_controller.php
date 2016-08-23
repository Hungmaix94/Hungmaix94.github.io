<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 10:08 AM
 */
class dashboard_controller extends base_controller
{
    function view(){
       if(isset($_SESSION['admin'])){
           
            $this->loadModel('dashboard_admin');
            $this->loadAdminView('dashboard',array(
                'emailAdmin'=>$this->model->getEmailAdmin($_SESSION['admin_id']),
//                TRUYEN VAO TONG SO BAI VIET
                'totalPosts' => $this->model->getTotalPosts(),
//                TONG SO ADMIN
                'totalUsers' => $this->model->getTotalUsers(),
//                
                'newestPosts' => $this->model->getNewestPosts(),
            ));
//           unset($_SESSION['admin']);
       }else{
           header("Location:".BASE_PATH."/admin/login");
       }
    }
}