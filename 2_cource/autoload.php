<?php

    spl_autoload_register(function($className){

        $path = str_replace('\\', '/', $className) . '.php';

        if(file_exists($path)){
            include_once($path);
       } else {
            echo $className . '<br>';
            echo $path . '<br>';
            exit('Class not found');
        }
    });