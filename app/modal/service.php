<?php

function activeServices(){
    global $db;

    $select = $db->prepare("SELECT * FROM service WHERE isActive = ?");
    $select->execute([1]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function allServices(){
    global $db;

    $select = $db->prepare("SELECT * FROM service ORDER BY isActive DESC, s_id DESC");
    $select->execute([]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getService($s_id){
    global $db;

    $select = $db->prepare("SELECT * FROM service WHERE s_id = ?");
    $select->execute([$s_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function makeNoActiveService($s_id){
    global $db;

    $update = $db->prepare("UPDATE service SET isActive = ? WHERE s_id = ?");
    $update->execute([0, $s_id]);

    return $update->rowCount();
}

function makeYesActiveService($s_id){
    global $db;

    $update = $db->prepare("UPDATE service SET isActive = ? WHERE s_id = ?");
    $update->execute([1, $s_id]);

    return $update->rowCount();
}

function addService($data){
    global $db;

    $insert = $db->prepare("INSERT INTO service (name, description, cost, price, isActive) values(?, ?, ?, ?, ?)");
    $insert->execute([
        $data['name'],
        $data['description'],
        $data['cost'],
        $data['price'],
        $data['isActive']
    ]);

    return $insert->rowCount();
}

function updateService($data){
    global $db;

    $update = $db->prepare("UPDATE service SET name = ?, description = ?, cost = ?, price = ? WHERE s_id = ?");
    $update->execute([
        $data['name'],
        $data['description'],
        $data['cost'],
        $data['price'],
        $data['s_id']
    ]);

    return $update->rowCount();
}