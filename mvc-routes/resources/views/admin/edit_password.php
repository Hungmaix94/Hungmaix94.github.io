<!-- --><?php //echo"<pre>";var_dump($_SESSION);echo"</pre>";?>
<?php include '_admin_template/header.php'?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo BASE_PATH ; ?>">RESET PASSWORD</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">RESET!</p>

        <form action="<?php echo BASE_PATH; ?>/admin/password/check/<?php echo $id;?>" method="post">
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <ul>
                        <?php foreach($_SESSION['error'] as $row) : ?>
                            <li> <?php echo $row ; ?></li>
                        <?php endforeach; ?>
                    </ul>

                </div>

            <?php endif; ?>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo isset($_SESSION['input']['old_password']) ? $_SESSION['input']['old_password'] : null; ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Repassword" name="repassword" value="<?php echo isset($_SESSION['input']['old_password']) ? $_SESSION['input']['old_password'] : null; ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">RESET</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


  

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php include '_admin_template/footer.php'?>
<?php //unset($_SESSION['error']) ?>
<?php //unset($_SESSION['mes']) ?>
<?php //unset($_SESSION['input']) ?>