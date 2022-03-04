<?php

function checkTime($b_id, $date){
    global $db;

    $select = $db->prepare("SELECT COUNT(r_id) AS num FROM reservation WHERE b_id = ? AND date = ?");
    $select->execute([$b_id, $date]);

    $totalBookings = $select->fetch(PDO::FETCH_ASSOC)['num'];

    return $totalBookings;
}

function getReservation($r_id){
    global $db;

    $select = $db->prepare("SELECT * FROM reservation WHERE r_id = ?");
    $select->execute([$r_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function makeReservation($data){
    global $db;
    
    $insert = $db->prepare("INSERT INTO reservation (b_id, c_id, s_id, date, time) values(?, ?, ?, ?, ?)");
    $insert->execute([$data['b_id'], $data['c_id'], $data['s_id'], $data['date'], $data['time']]);

    return $insert->rowCount();
}

function cancelReservation($r_id){
    global $db;

    $update = $db->prepare("UPDATE reservation SET status = ? WHERE r_id = ?");
    $update->execute([0, $r_id]);
}

function getUserAllDoneReservation($c_id){
    global $db;
    
    $select = $db->prepare('SELECT 
        r.r_id AS r_id,
        r.date AS date,
        r.time AS time,
        b.name AS barberName,
        s.name AS serviceName,
        bll.discountAmount AS discountAmount,
        bll.totalAmount AS totalAmount
        FROM (((reservation AS r 
        INNER JOIN barber AS b ON r.b_id = b.b_id) 
        INNER JOIN service AS s ON r.s_id = s.s_id)  
        INNER JOIN bill AS bll ON r.r_id = bll.r_id)  
        WHERE c_id = ? ORDER BY r_id DESC');
    $select->execute([$c_id]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getUserAllOnComingReservation($c_id){
    global $db;
    
    $select = $db->prepare('SELECT 
        r.r_id AS r_id,
        r.date AS date,
        r.time AS time,
        b.name AS barberName,
        s.name AS serviceName
        FROM ((reservation AS r 
        INNER JOIN barber AS b ON r.b_id = b.b_id) 
        INNER JOIN service AS s ON r.s_id = s.s_id)  
        WHERE c_id = ? AND status = ? AND r.r_id NOT IN (SELECT r_id FROM bill) ORDER BY r_id ASC');
    $select->execute([$c_id, 1]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getOneReservationDetail($r_id){
    global $db;
    
    $select = $db->prepare('SELECT 
        r.r_id AS r_id,
        b.b_id AS b_id,
        s.s_id AS s_id,
        c.c_id AS c_id,
        b.name AS barberName,
        s.name AS serviceName,
        c.name AS customerName,
        r.date AS date,
        r.time AS time,
        s.cost AS cost,
        s.price AS price
        FROM (((reservation AS r 
        INNER JOIN barber AS b ON r.b_id = b.b_id) 
        INNER JOIN service AS s ON r.s_id = s.s_id) 
        INNER JOIN customer AS c ON r.c_id = c.c_id)  
        WHERE r_id = ? AND r.r_id NOT IN (SELECT r_id FROM bill)');
    $select->execute([$r_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function getAllOnComingReservationCount(){
    global $db;
    
    $select = $db->prepare('SELECT 
        COUNT(r_id) AS total
        FROM reservation
        WHERE status = ? AND r_id NOT IN (SELECT r_id FROM bill)');
    $select->execute([1]);

    return $select->fetch(PDO::FETCH_ASSOC)['total'];
}

function getMostComingCustomer(){
    global $db;

    $select = $db->prepare("SELECT 
        reservation.c_id, 
        customer.name,
        COUNT(*) AS magnitude 
        FROM (reservation
        INNER JOIN customer ON reservation.c_id = customer.c_id)
        GROUP BY c_id 
        ORDER BY magnitude DESC
        LIMIT 1");
    $select->execute([]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function getBarbersOneMonthReservationCount(){
    global $db;

    $select = $db->prepare("SELECT 
        reservation.b_id, 
        barber.name,
        COUNT(*) AS magnitude 
        FROM (reservation
        INNER JOIN barber ON reservation.b_id = barber.b_id)
        WHERE date <= CURDATE() AND date >= CURDATE() - INTERVAL 1 MONTH 
        GROUP BY b_id
        ORDER BY magnitude DESC
        ");
    $select->execute([]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getMostPreferedServiceOneMonth(){
    global $db;

    $select = $db->prepare("SELECT 
        reservation.s_id, 
        service.name,
        COUNT(*) AS magnitude 
        FROM (reservation
        INNER JOIN service ON reservation.s_id = service.s_id)
        WHERE date <= CURDATE() AND date >= CURDATE() - INTERVAL 1 MONTH 
        GROUP BY s_id
        ORDER BY magnitude DESC
        LIMIT 1");
    $select->execute([]);

    return $select->fetch(PDO::FETCH_ASSOC);
}
