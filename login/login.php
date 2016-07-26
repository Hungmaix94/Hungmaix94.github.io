<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
</head>
<body>
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
    <h1>Material Login Form</h1><span>Bài tập của Nghĩa <i class='fa fa-code'></i> by <a
            href='https://github.com/nghiatv'>Nghĩa Thân</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
    <div class="card"></div>
    <div class="card">
                <form action="checklogin.php" method="post">
                    <div class="note_error"><?php isset($_SESSION['error'])? print_r($_SESSION['error']) : ""; ?></div>
                    <div class="input-container">
                        <input type="text" id="Username" name="username" required="required" value="<?php isset($_SESSION['username'])? print_r($_SESSION['username']) : ""; ?>"/>
                        <label for="Username">Username</label>
                        <div class="bar"></div>
                        <div class="error"><?php isset($_SESSION['error_validate_user'])? print_r($_SESSION['error_validate_user']) : ""; ?>
                        </div>
                    </div>
                    <div class="input-container">
                        <input type="password" id="Password" name="password" required="required" value="<?php isset($_SESSION['password'])? print_r($_SESSION['password']) : ""; ?>"/>
                        <label for="Password">Password</label>
                        <div class="bar"></div>
                        <div class="error"><?php isset($_SESSION['error_validate_pass'])? print_r($_SESSION['error_validate_pass']) : " "; ?>

                        </div>
                    </div>
                    <div class="button-container">
                        <button><span>Go</span></button>
                    </div>
                    <div class="footer"><a href="#">Forgot your password?</a></div>
                </form>
    </div>
</div>
</body>
</html>
<?php
//if (isset($_SESSION['username'])){
//    header("Location: success.php");
//}
session_destroy();
?>