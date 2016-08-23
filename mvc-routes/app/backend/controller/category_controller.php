<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/18/2016
 * Time: 11:18 AM
 */
class category_controller extends base_controller
{
//    load ra view để admin tạo mới category
    function create()
    {
        if (isset($_SESSION['admin'])) {
            $this->loadModel("category_admin");
            $this->loadAdminView("create_category");
        } else {
            header("Location:" . BASE_PATH . "/admin/login");
        }

    }

    function insert()
    {
        if (isset($_SESSION['admin'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->loadModel("category_admin");
//                
                $checkCategoryName = $this->model->checkCategoryName($_POST['category_name']);
//                echo"<pre>"; var_dump($checkCategoryName); echo "</pre>";exit();
//                $checkCategoryName có trả về true không có trả về false
                if (!$checkCategoryName) {
                    if ($this->model->insertCategory($_POST["category_name"])) {
                        $data = $_POST["category_name"];
                        Helper::setMes("insert", "Thêm thành công" . $_POST['category_name']);
                        $this->loadAdminView("create", array(
                            "data" => $data
                        ));
                    } else {
                        Helper::setError("insert", "Không thêm mới được " . $_POST['category_name']);

                        header("Location:" . BASE_PATH . "/admin/category/create");
                    }
                }else{
                    Helper::setError("create","Tên đã bị trùng nhé");
                    $data = $_POST["category_name"];
                    $this->loadAdminView("create", array(
                        "data" => $data
                    ));
                }

            } else {
                header("Location:" . BASE_PATH . "/admin/login");
            }

        }
    }

//    lấy info category cần chỉnh sửa xuất ra view tiện cho việc admin chỉnh sửa
    function edit($id)
    {
        if (isset($_SESSION['admin'])) {

            $this->loadModel("category_admin");
            $data = $this->model->getCategoryById($id);
            $this->loadAdminView("edit_category", array(
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

                $this->loadModel("category_admin");
        
                $result = $this->model->updateCategory($_POST['category_name'], $id);
        
                if ($result) {
                    Helper::setMes('update', "Cập Nhật thành công");

                } else {
                    Helper::setError("update", "Không cập nhật được category");

                }
                header("Location:" . BASE_PATH . "/admin/category/");
            } else {
                header("location:" . BASE_PATH . "/admin/category/");
            }
        } else {
            header("location:" . BASE_PATH . "/admin/login");
        }
    }

    function view()
    {
//        echo "<pre>";var_dump("DCm sao the");echo "</pre>"; exit;
        if (isset($_SESSION['admin']) && isset($_SESSION['admin_id'])) {

            $this->loadModel('category_admin');
            $data = $this->model->getAllCategory();
            $this->loadAdminView('list_categories', array(
                'data' => $data
            ));


        } else {
            header('location:' . BASE_PATH . '/admin/login ');
        }
    }

    function delete($id)
    {

        if (isset($_SESSION['admin'])) {
            $this->loadModel("category_admin");
         
            if ($this->model->updatePostDeleteCategory($id)) {
                $result = $this->model->deleteById("categories", $id);
                if ($result) {
                    Helper::setMes("delete", "Xóa thành công category co id " . $id);
                    header("Location:" . BASE_PATH . "/admin/category");
                }else{
                    Helper::setError("delete", "Không xóa được: " . $id);
                    header("Location:" . BASE_PATH . "/admin/category/");
                }
            } else {
              
                Helper::setError("update", "Không cập nhật được bài viết thuộc category co id là: " . $id . ".");
                header("Location:" . BASE_PATH . "/admin/category");
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