<?php

spl_autoload_register(function($fileName) {
    $path = '../app';
    if (file_exists("$path/Core/$fileName.php")) require_once "$path/Core/$fileName.php";
    if (file_exists("$path/Controllers/$fileName.php")) require_once "$path/Controllers/$fileName.php";
    if (file_exists("$path/Models/$fileName.php")) require_once "$path/Models/$fileName.php";
});