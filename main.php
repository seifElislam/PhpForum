<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

define('HOST','localhost');
define('DB_NAME','jaguars');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
// autoload
function __autoload($class_name) {


    if(file_exists("model/".$class_name.".php")){

        include ("model/".$class_name.".php");
    }






}
