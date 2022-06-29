<?php

function DBconexion(){
    $server="localhost";
    $user="root";
    $password="";
    $database ="pasteleria";
    $conexiones= new mysqli($server, $user, $password, $database);
    mysqli_set_charset($conexiones,'utf8');
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    return $conexiones;
}
?>