<?php
session_start();
//var_dump($_POST);
//die('hung cai cc');
/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 7/24/2016
 * Time: 11:36 PM
 */
$db_name = "csdl";
$host_name = "localhost";
$user_name = "root";
$pass_word = "123456";

$conn = new PDO("mysql:host=$host_name;dbname=$db_name", $user_name, $pass_word) or die("chet roi nhe");


//    var_dump($_SESSION);

//    đầu vào validate
$pattern = "/[a-zA-Z0-9]{6,32}/";


if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $flag = 1;
//        regex
    if (!preg_match($pattern, $_POST['username'], $match)) {
        $flag = 0;
        $_SESSION['error_validate_user'] = "username không hợp lệ";
        header("Location: login.php");
       
    }
    if (!preg_match($pattern, $_POST['password'], $match2)) {
        $flag = 0;
        $_SESSION['error_validate_pass'] = "password không hợp lệ";
        header("Location: login.php");
    }
//        kiem tra chính xác

    if ($flag == 1) {
        $sql = "SELECT * FROM `user` WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
        var_dump($sql);
        $stmt = $conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        if (!$result){
            $_SESSION['error']=" Nhap sai username password";
            header("location:login.php");
            exit();
        }
        header("location:success.php");
        die();
    }
}
?>


