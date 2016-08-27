<?php
/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/22/2016
 * Time: 9:49 AM
 */
?>

<?php include '_admin_template/header.php' ?>
<body class="hold-transition skin-blue sidebar-mini">
<?php include '_admin_template/menu.php' ?>
<?php include '_admin_template/sidebar.php' ?>

<div class="register-box">
    <div class="register-logo">
        <a href="#">Tạo user mới</a>
    </div>

    <div class="register-box-body">
        <form action="<?php echo BASE_PATH ?>/admin/user/insert" method="post" enctype="multipart/form-data">

            <?php if(isset($_SESSION['mes']['update'])): ;?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $_SESSION['mes']['update'];?>
                </div>
            <?php endif ;?>
            <?php if(isset($_SESSION['error']['update'])): ;?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <? echo $_SESSION['error']['update']?>
                </div>
            <?php endif ;?>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="User Name" name="username"
                       value="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email"
                       value="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback input-group">
                <input type="password" class="form-control" placeholder="Password" name="password"
                       value="">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-dropbox"><span class="glyphicon glyphicon-edit "></span> Chỉnh Sửa </button>
                </div>
            </div>
            <div class="form-group has-feedback ">
                <input type="password" class="form-control" placeholder="Repassword" name="repassword"
                       value="">
            </div>
            <div class="form-group has-feedback" >
                Avatar: 
                <input type="file"  class="form-control" name="fileToUpload" id="fileToUpload" >

            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Cập nhật thông tin</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- --><?php //echo"<pre>";var_dump($_SESSION);echo"</pre>";?>
<?php unset($_SESSION['error']); ?>
<?php unset($_SESSION['mes']); ?>
<?php include '_admin_template/footer.php' ?>
