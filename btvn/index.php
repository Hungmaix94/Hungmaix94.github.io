<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 07/08/2016
 * Time: 8:01 CH
 */
session_start();
include "config.php";

include "libs/bootstrap.php";



//điều hướng admin
$admin_pattern = "/(\/admin).*$/";
//echo"<pre>"; var_dump($_SERVER['REQUEST_URI']); echo "</pre>";exit();
if(preg_match($admin_pattern, $_SERVER['REQUEST_URI'])){
    $app = new application_admin();
} else {
    $app = new application();
}






