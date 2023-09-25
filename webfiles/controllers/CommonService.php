<?php

namespace controllers;

abstract class CommonService
{

    protected function processFiles(): array
    {
        $imageLinks = [];
        $i = 0;

        foreach ($_FILES as $file) {
            $nom = $file["name"];
            $path = $file["tmp_name"];
            $target_file = "/assets/uploads/" . $nom;
            $imageLinks[$i] = $target_file;
            move_uploaded_file($path, ".." . $target_file);
            $i++;
        }
        return $imageLinks;
    }

}