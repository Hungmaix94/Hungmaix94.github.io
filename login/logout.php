<?php
/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 7/22/2016
 * Time: 12:31 PM
 */
session_start();
session_destroy();
echo 'You have cleaned session';
header('Location:login.php');
?>

