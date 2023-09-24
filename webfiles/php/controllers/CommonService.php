<?php

namespace Controllers;

abstract class CommonService
{

    protected function processFiles()
    {
        $imageLinks = [];
        $i = 0;

        foreach ($_FILES as $file) {
            $nom = $file["name"];
            $path = $file["tmp_name"];
            $target_file = "assets/src/uploads/" . $nom;
            $imageLinks[$i] = $target_file;
            move_uploaded_file($path, "../" . $target_file);
            $i++;
        }
        return $imageLinks;
    }

}