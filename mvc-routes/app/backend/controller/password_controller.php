<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/27/2016
 * Time: 9:46 AM
 */
class password_controller extends base_controller{

    public function viewResetPass(){
//        load view dể nhập mail xác nhận
        $this->loadAdminView("reset_password");
    }
    public function verify(){

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $flag = 0;

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                Helper::setError("email","Email không hợp lệ!");
                $flag = 1;
            }
            if($flag == 0){
                $this->loadModel("password_admin");
                if($this->model->checkEmail($email)&&$this->model){
                    $data = $this->model->getDataByEmail($email);
                    $username = $data['user_name'];
                    $confirm_code = md5($username);
                    if($this->model->checkConfirm ($data['id'])){
                        if($this->model->updateConfirmcode($confirm_code,$data['id'])){
                            $mail = new Mail();
                            $mail->resetPass($email,$confirm_code);
                        }else{
                            Helper::setError("update","không update được confirm code");
                            header("Location:".BASE_PATH."/admin/password/reset");
                        }
                    }else{
                       Helper::setError("confirm","Bạn chưa xác thuc tai khoan");
                       header("Location:".BASE_PATH."/admin/password/reset");
                    }

                }else{
                    Helper::setError("email","Email chưa đăng kí");
                    header("Location:".BASE_PATH."/admin/login");
                }
            }else{
                echo"<pre>"; var_dump("sai á"); echo "</pre>";exit();
            }
            
        }else{
            echo"<pre>"; var_dump("ban phai nhap vao form nhe"); echo "</pre>";exit();
        }
        
    }
    public function reset($confirm_code){
        $this->loadModel("password_admin");
        $data = $this->model->getDataByConfirmCode($confirm_code);
        $this->loadAdminView("edit_password",array(
            "id"=>$data['id']
        ));
    }
    public function check($id){
        if (isset($_POST['password'])&&isset($_POST['repassword'])){
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $flag = 0;
            $this->loadModel("password_admin");
            $data = $this->model->getById("users",$id);

            if(!Validation::isValidPass($password)){
                $flag =1;
                Helper::setError("password","Sai dinh dang password");
                header("Location:".BASE_PATH."/admin/password/reset/".$data['confirm_code']);
            }
            if($password != $repassword){
                $flag = 1;
            }
            $password = password_hash($password,PASSWORD_BCRYPT);
            if($flag == 0){

                if($this->model->updatePass($id,$password)){
                    Helper::setMes("success","Cap nhat pass thanh cong");
                    header("Location:".BASE_PATH."/admin/login/");
                }else{
                    Helper::setError("update","Capj nhat pass khong thanh cong");
                    header("Location:".BASE_PATH."/admin/password/reset/".$data['confirm_code']);
                };
            }else{

            }
        }else{
            header("Location:".BASE_PATH."/admin/");
        }
    }
}