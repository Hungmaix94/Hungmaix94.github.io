<?php
session_start();

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




//    var_dump($_SESSION);

//    đầu vào validate
$pattern = "/[a-zA-Z0-9]{6,32}/";


if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email']=$_POST['email'];
    $flag = 1;
//        regex
    if (!preg_match($pattern, $_POST['username'], $match)) {
        $flag = 0;
        $_SESSION['error_validate_user'] = "username không hợp lệ";
        header("Location: register.php");

    }
    if (!preg_match($pattern, $_POST['password'], $match2)) {
        $flag = 0;
        $_SESSION['error_validate_pass'] = "password không hợp lệ";
        header("Location: register.php");
    }
//        kiem tra chính xác

    if ($flag == 1) {
//        check user va pass co trung nhau ko
        $conn = new PDO("mysql:host=$host_name;dbname=$db_name", $user_name, $pass_word) or die("chet roi nhe");
        $sql = "SELECT * FROM user WHERE username = '" . $_POST['username']. "'";
        $stmt = $conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result){
            $_SESSION['error']="username đã tồn tại";
            header("location:register.php");
            exit();
        }

//        $sql="INSERT INTO user (username,password) VALUES('".$_POST['username']."','".$_POST['password']."')";
//
//        $conn->exec($sql);
//        var_dump($conn);
//        var_dump($sql);
        try{
//
            $stmt = $conn->prepare("INSERT INTO user (username,password) VALUES(?,?)");
            $stmt->bindParam(1,$_POST['username'],PDO::PARAM_STR);
            $stmt->bindParam(2,$_POST['password'],PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        var_dump($stmt);
        die();
    }
}
?>


