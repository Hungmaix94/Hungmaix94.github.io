<?php






class register_controller extends base_controller
{
    function view()
    {
        $this->loadAdminView('register');
    }

    public function check()
    {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email']) && $_POST['agree'] == 'on') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $email = $_POST['email'];
            Helper::oldInputResgister($username, $password, $repassword, $email);

            $flag = 0;


            if (!Validation::isValidUser($username)) {
                Helper::setError('username', "Sai dinh dang username");
                $flag = 1;
            }
            if (!Validation::isValidPass($password)) {
                Helper::setError('password', "Sai dinh dang password");
                $flag = 1;
            }
            if (!Validation::isValidPass($repassword)) {
                Helper::setError('repassword', "Sai dinh dang repassword");
                $flag = 1;
            }
            if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
                Helper::setError('email', "Email khong hop le");
                $flag = 1;
            }
            if ($password != $repassword) {
                Helper::setError('repassword', "Hai mat khau khong trung nhau");
                $flag = 1;
            }
            if ($flag == 0) {
                $this->loadModel('register_admin');
                if ($this->model->checkExist($username, $email)) {
                    Helper::setError('sys', 'Tài khoản hoặc Email đã tồn tại nhé!');
                    header("Location:" . BASE_PATH . "/admin/register");
                } else {
                    if ($this->model->add($username, $password, $email)) {
                        $result = $this->model->getDataByName($username);
                        $mail = new Mail();
                        $mail->verify($result);
                        header("Location:" . BASE_PATH . "/admin/login/view");
                    } else {
                        Helper::setError('sys', 'Co gi do sai sai');
                        header("Location:" . BASE_PATH . "/admin/register");
                    }
                }
            } else {
                header("Location:" . BASE_PATH . "/admin/register");
            }
        }
    }
    public function verify($confirm_code){


      $this->loadModel("register_admin");
       $result = $this->model->checkVerify($confirm_code);
       if($result){
           echo"<pre>"; var_dump("Verify r nhe"); echo "</pre>";exit();
           header("Location:".BASE_PATH."/admin/login");
       }else{
           echo"<pre>"; var_dump("sai"); echo "</pre>";exit();
       }
    }
}