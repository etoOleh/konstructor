<?php

declare(strict_types=1);

namespace Model;
header('Content-type: json/application');


/**
 * Модель аплоуд файла
 *
 */
class NewPostModel
{
    public function uploadFile(): string
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }


        $str = '';
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $str =  "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $str =  "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                $str =  "Sorry, there was an error uploading your file.";
            }
        }

        return $str;
    }
}