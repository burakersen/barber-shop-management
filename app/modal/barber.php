<?php

function activeBarbers(){
    global $db;

    $select = $db->prepare("SELECT name, b_id FROM barber WHERE isActive = ?");
    $select->execute([1]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function leftBarbers(){
    global $db;

    $select = $db->prepare("SELECT name, b_id FROM barber WHERE isActive = ?");
    $select->execute([0]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function alllBarbers(){
    global $db;

    $select = $db->prepare("SELECT * FROM barber ORDER BY isActive DESC, startedDate DESC");
    $select->execute();

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getBarber($b_id){
    global $db;

    $select = $db->prepare("SELECT * FROM barber WHERE b_id = ?");
    $select->execute([$b_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function getBarberOneDayReservation($b_id, $date){
    global $db;

    $select = $db->prepare("SELECT * FROM reservation WHERE b_id = ? AND date = ? AND status = ?");
    $select->execute([$b_id, $date, 1]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function barber_signIn($phoneNumber, $password){
    global $db;

    $select = $db->prepare("SELECT * FROM barber WHERE phoneNumber = ? AND password = ? AND isActive = ?");
    $select->execute([$phoneNumber, md5($password), 1]);

    $barber = $select->fetch(PDO::FETCH_ASSOC);

    if($select->rowCount()>0) return $barber['b_id'];

    return -1;
}

function getOneBarberAllAddresses($b_id){
    global $db;

    $select = $db->prepare("SELECT * FROM barber_address WHERE b_id = ? ORDER BY adr_id DESC");
    $select->execute([$b_id]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getOneBarberOneAddress($b_id, $adr_id){
    global $db;

    $select = $db->prepare("SELECT * FROM barber_address WHERE b_id = ? AND adr_id = ?");
    $select->execute([$b_id, $adr_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function updateBarberAddress($data){
    global $db;

    $update = $db->prepare("UPDATE barber_address SET zipCode = ?, country = ?, city = ?, street = ?, apartmentNumber = ?, number = ? WHERE adr_id = ?");
    $update->execute([
        $data['zipCode'],
        $data['country'],
        $data['city'],
        $data['street'],
        $data['apartmentNumber'],
        $data['number'],
        $data['adr_id']
    ]);

    return $update->rowCount();
}

function addBarberAddress($data){
    global $db;

    $insert = $db->prepare("INSERT INTO barber_address (b_id, zipCode, country, city, street, apartmentNumber, number) values(?, ?, ?, ?, ?, ?, ?)");
    $insert->execute([
        $data['b_id'],
        $data['zipCode'],
        $data['country'],
        $data['city'],
        $data['street'],
        $data['apartmentNumber'],
        $data['number']
    ]);

    return $insert->rowCount();
}

function deleteBarberAddress($adr_id){
    global $db;

    $delete = $db->prepare("DELETE FROM barber_address WHERE adr_id = ?");
    $delete->execute([$adr_id]);

    return $delete->rowCount();
}

function makeNoActiveBarber($b_id){
    global $db;

    $update = $db->prepare("UPDATE barber SET isActive = ? WHERE b_id = ?");
    $update->execute([0, $b_id]);

    return $update->rowCount();
}

function makeYesActiveBarber($b_id){
    global $db;

    $update = $db->prepare("UPDATE barber SET isActive = ? WHERE b_id = ?");
    $update->execute([1, $b_id]);

    return $update->rowCount();
}

function signInBarber($data){
    global $db;

    $insert = $db->prepare("INSERT INTO barber (name, phoneNumber, password, startedDate, isActive) values(?, ?, ?, CURDATE(), ?)");
    $insert->execute([
        $data['name'],
        $data['phoneNumber'],
        md5($data['password']),
        1
    ]);

    return $insert->rowCount();
}
