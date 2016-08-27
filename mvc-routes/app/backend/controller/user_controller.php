<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/20/2016
 * Time: 12:34 PM
 */
class user_controller extends base_controller
{
    function create()
    {
        if (isset($_SESSION['admin'])) {
            $this->loadModel("user_admin");
            $this->loadAdminView("create_user");
        } else {
            header("Location:" . BASE_PATH . "/admin/login");
        }

    }

    function insert()
    {
        if (isset($_SESSION['admin'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $flag = 1;
             
                if(!Validation::isValidUser($_POST['username'])){
                    $flag = 0;

                    Helper::setError("username","Username không họp lệ");
                }
                if(!Validation::isValidPass($_POST['password'])){
                    $flag = 0;

                    Helper::setError("password","Password không họp  lệ");
                }

                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $flag = 0;

                    Helper::setError("email","Email không họp  lệ");
                }
                if($_POST['password'] != $_POST['repassword']){
                    $flag = 0;

                    Helper::setError("repassword","Password không khớp");
                }
                if(!UploadFile::checkImageFile()) {
                    $flag = 0;
                   

                }
                
                if($flag == 0){
                    header("Location:".BASE_PATH."/admin/user/create");
                }
                $this->loadModel("user_admin");
                if($this->model->insertUser()){
                    Helper::setMes("insert","Thêm thành công");
                }else{
                    Helper::setError("insert","Không thêm được");
                }
                $this->model->getIdUser();
                header("Location:".BASE_PATH."/admin/user/edit");

            }else{
                header("Location:".BASE_PATH."/admin/user");
            }

        } else {
            header("Location:" . BASE_PATH . "/admin/login");
        }
    }

//    lấy info category cần chỉnh sửa xuất ra view tiện cho việc admin chỉnh sửa
    function edit($id)
    {
        if (isset($_SESSION['admin'])) {
            $this->loadModel("user_admin");
            $data = $this->model->getUserById($id);
            $this->loadAdminView("edit_user",array(
                "data" => $data
            ));
        }


    }
//     sau khi người dùng nhập vào form chỉnh sửa và submit,
// gửi lên server the method POST(chú ý phải kiểm tra là method POST tránh trường hợp người dùng nhâp url vẫn có thể chỉnh sửa)
    function update($id)
    {

        if (isset($_SESSION['admin'])) {

            if (($_SERVER['REQUEST_METHOD'] == "POST")) {
                
                $flag = 1;
                if(!Validation::isValidUser($_POST['username'])){
                    $flag = 0;
                    Helper::setError("username","Username không họp lệ");
                }
                
                if(!Validation::isValidPass($_POST['password'])){
                    $flag = 0;
                    Helper::setError("password","Password không họp  lệ");
                }
                
                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $flag = 0;  
                    Helper::setError("email","Email không họp  lệ");
                }
                if($_POST['password'] != $_POST['repassword']){
                    $flag = 0;
                    Helper::setError("repassword","Password không khớp");
                }
                if($flag == 0){
                    header("Location:".BASE_PATH."/admin/");
                }
                $this->loadModel("user_admin");
                $result = $this->model->updateUser();
                if ($result) {
                    Helper::setMes('update', "Cập Nhật thành công");
                } else {
                    Helper::setError("update", "Không cập nhật được user");
                }
                header("Location:" . BASE_PATH . "/admin/user/");
            } else {
                header("location:" . BASE_PATH . "/admin/user/");
            }
        } else {
            header("location:" . BASE_PATH . "/admin/login");
        }
    }

    function view()
    {

        if (isset($_SESSION['admin']) && isset($_SESSION['admin_id'])) {
            $this->loadModel('user_admin');
            $data = $this->model->getAllUser();
            $this->loadAdminView('list_users', array(
                'data' => $data,
                'title' => "Danh sách người dùng:"
            ));

        } else {
            header('location:' . BASE_PATH . '/admin/login ');
        }
    }

    function delete($id)
    {
        if (isset($_SESSION['admin'])) {
            $this->loadModel("user_admin");
            if($this->model->updatePostDeleteUser($id)){
                $result = $this->model->deleteById("users",$id);
                if ($result) {
                    Helper::setMes("delete", "Xóa thành công user có id " . $id);

                }else{
                    Helper::setError("delete", "Không xóa được: " . $id);
                }
                header("Location:" . BASE_PATH . "/admin/user");
            }else{
                Helper::setError("updatePost","Khong chuyển được bài viết thuộc user cần xóa");
                header("Location:".BASE_PATH."/admin/user");
            }

        }

    }

    function show($id)
    {
        if (isset($_SESSION['admin'])) {

            $this->loadModel("category_admin");
            $data = $this->model->getPostByCategoryId($id);
//           echo"<pre>"; var_dump($data); echo "</pre>";exit();
            $this->loadAdminView("list_posts", array(
                "data" => $data
            ));
        }
    }
}