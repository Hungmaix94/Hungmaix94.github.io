<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/11/2016
 * Time: 4:28 PM
 */
class post2_controller extends base_controller
{
    public function view($param = null)
    {
        $this->loadView('post2',array(
            'title'=>"Them bai viet",
            'description'=>"Người dùng thêm bài viết"
        ));

    }

}