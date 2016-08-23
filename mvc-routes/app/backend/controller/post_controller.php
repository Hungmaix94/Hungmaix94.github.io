<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 10/08/2016
 * Time: 9:41 CH
 */


include dirname(PATH_APPLICATION) . "/libs/Helper.php";


class post_controller extends base_controller
{
    function create()
    {
        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['status'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $status = $_POST['status'];
            $status = filter_var($status, FILTER_SANITIZE_NUMBER_INT);
            $category = filter_var($category, FILTER_SANITIZE_NUMBER_INT);

//            var_dump(empty($status));

            if (empty($title) || empty($content) || empty($status) || empty($category)) {
                Helper::setError('edit', "Something wrong");
            } else {
                $this->loadModel('post_admin');

                if ($this->model->insertPost($title, $content, $category, $status)) {
                    header('location:' . BASE_PATH . '/admin ');

                }else{
                    Helper::setError('insert',"Không thể thêm bài viết");
                }


            }


        } else {
            $this->loadModel('post_admin');

            $this->loadAdminView('create_post', array(
                'listCategories' => $this->model->getListCategories()
            ));
        }
    }
    function edit($id)
    {
        $this->loadModel('post_admin');

        $this->model->getPostById($id);

        $this->loadAdminView('edit',array(
           'listCategories' => $this->model->getListCategories(),
            'oldData' => $this->model->getPostById($id)
        ));

//        $this->loadModel()

    }
    function view()
    {
//        echo "<pre>";var_dump("DCm sao the");echo "</pre>"; exit;
        if (isset($_SESSION['admin']) && isset($_SESSION['admin_id'])) {

            $this->loadModel('post_admin');
            $data = $this->model->getAllPost();
            $this->loadAdminView('list_posts', array(
                'data' => $data,
            ));

//        $this->loadModel()

        } else {
            header('location:' . BASE_PATH . '/admin/login ');
        }
    }
    function delete($id){
        $this->loadModel("post_admin");
        if(isset($_SESSION['admin'])){
            $result = $this->model->deleteById("posts",$id);
//        echo"<pre>"; var_dump($result); echo "</pre>";exit();
            if (!$result){
                Helper::setError("posts","Không xóa được bài viết");
                header("location:".BASE_PATH."/admin/post");
            }
            else{
                Helper::setMes("delete","Xóa thành công bài viết có là <b>".$id."</b> rồi");
                header("location:".BASE_PATH."/admin/post");
            }


        }

    }

    // xu ly load anh
//    public function ckeditor($a = 0){
//        include dirname(PATH_APPLICATION).'/public/vendor/AdminLTE/plugins/ckeditor/plugins/imageuploader/imgbrowser.php';
//    }
}