<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/23/2016
 * Time: 9:56 AM
 */
class UploadFile
{
    static function checkImageFile(){
        $target_dir = "public/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                Helper::setMes("file","File is an image -" . $check['mime'] .".") ;
                $uploadOk = 1;
            } else {
                Helper::setError("file","File is not an image.") ;
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            Helper::setError("file_exists","Sorry, file already exists");
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            Helper::setError("file_size","Sorry, your file is too large.");

            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            Helper::setError("file_type","Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            Helper::setError("file","Sorry, your file was not uploaded.");
            return false;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                Helper::setMes("upload_file","The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.");
                return true;
            } else {
                Helper::setError("upload_file","Sorry, there was an error uploading your file.");
                return false;
            }
        }
    }
}