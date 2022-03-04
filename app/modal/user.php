<?php

function checkPhoneNumber($phoneNumber){
    global $db;
    $select = $db->prepare('SELECT c_id FROM customer WHERE phoneNumber = ?');
    $select->execute([$phoneNumber]);

    $user = $select->fetch(PDO::FETCH_ASSOC);

    if($select->rowCount()>0) return $user['c_id'];
    return -1;
}

function register($fullName, $phoneNumber, $password){
    global $db;
    $insert = $db->prepare('INSERT INTO customer (name, phoneNumber, password) values(?, ?, ?)');
    $insert->execute([$fullName, $phoneNumber, md5($password)]);

    if($insert->rowCount()>0) return true;
    return false;
}

function signIn($phoneNumber, $password){
    global $db;
    $select = $db->prepare('SELECT c_id FROM customer WHERE phoneNumber = ? AND password = ?');
    $select->execute([$phoneNumber, md5($password)]);

    $user = $select->fetch(PDO::FETCH_ASSOC);

    if($select->rowCount()>0) return $user['c_id'];
    return -1;
}

function getUser($c_id){
    global $db;

    $select = $db->prepare('SELECT * FROM customer WHERE c_id = ?');
    $select->execute([$c_id]);

    if($select->rowCount()>0) return $select->fetch(PDO::FETCH_ASSOC);
    return null;
}

function alllCustomers(){
    global $db;

    $select = $db->prepare('SELECT * FROM customer ORDER BY c_id DESC');
    $select->execute([]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function totalCustomer(){
    global $db;

    $select = $db->prepare('SELECT COUNT(c_id) AS total FROM customer');
    $select->execute([]);

    return $select->fetch(PDO::FETCH_ASSOC);
}
