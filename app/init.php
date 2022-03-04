<?php
session_start();
ob_start();

$config = require __DIR__ . '/config.php';

try{
    $db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['pass']);
}catch(PDOException $e){
    die($e->getMessage());
}

foreach(glob(__DIR__ . '/helper/*.php') as $helperFile){
    require $helperFile;
}

if(session('c_id')){
    require modal('user');
    $user = getUser(session('c_id'));

    if(!$user) die();

    $user_name = $user['name'];
    $user_phone = $user['phoneNumber'];
}