<?php include '_admin_template/header.php' ?>

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?php echo BASE_PATH; ?>">Reset Password</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg"></p>

            <form action="<?php echo BASE_PATH; ?>/admin/password/verify" method="post">

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
                Quên mật khẩu hãy điền email của bạn xuống dưới đây và chúng tôi sẽ gửi thư xác thực !
                <div class="form-group has-feedback">

                    <input type="text" class="form-control" placeholder="Email" name="email"
                           value="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php unset($_SESSION['error']); ?>
<?php unset($_SESSION['mes']); ?>
<?php include '_admin_template/footer.php' ?>