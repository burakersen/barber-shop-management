<?php

function getBillWithReservation($r_id){
    global $db;

    $select = $db->prepare("SELECT * FROM bill WHERE r_id = ?");
    $select->execute([$r_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function createBill($data){
    global $db;

    $insert = $db->prepare("INSERT INTO bill (r_id, discountAmount, totalAmount, date) values(?, ?, ?, ?)");
    $insert->execute([
        $data['r_id'],
        $data['discountAmount'],
        $data['totalAmount'],
        $data['date']
    ]);

    if($insert->rowCount()>0) return 1;
    return -1;
}

function getOneBarberAllBills($b_id){
    global $db;

    $select = $db->prepare("SELECT 
        bill.bill_id AS bill_id,
        bill.discountAmount AS discountAmount,
        bill.totalAmount AS totalAmount,
        bill.date AS date,
        b.name AS barberName,
        c.name AS customerName,
        s.name AS serviceName
        FROM bill 
        INNER JOIN reservation AS r ON bill.r_id = r.r_id
        INNER JOIN barber AS b ON r.b_id = b.b_id
        INNER JOIN customer AS c ON r.c_id = c.c_id
        INNER JOIN service AS s ON r.s_id = s.s_id
        WHERE bill.r_id IN (SELECT r_id FROM reservation WHERE b_id = ?) ORDER BY date DESC");
    $select->execute([$b_id]);

    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function getOneBarberdailyGiro($b_id){
    global $db;

    $select = $db->prepare("SELECT
            SUM(bill.totalAmount) AS total
            FROM bill
            WHERE date = CURDATE() AND r_id IN (SELECT r_id FROM reservation WHERE b_id = ?)
        ");
    $select->execute([$b_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function getOneBarbermonthlyGiro($b_id){
    global $db;

    $select = $db->prepare("SELECT
            SUM(bill.totalAmount) AS total
            FROM bill
            WHERE date <= CURDATE() AND date >= CURDATE() - INTERVAL 1 MONTH AND r_id IN (SELECT r_id FROM reservation WHERE b_id = ?)
        ");
    $select->execute([$b_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function getOneBarberyearlyGiro($b_id){
    global $db;

    $select = $db->prepare("SELECT
            SUM(bill.totalAmount) AS total
            FROM bill
            WHERE date <= CURDATE() AND date >= CURDATE() - INTERVAL 1 YEAR AND r_id IN (SELECT r_id FROM reservation WHERE b_id = ?)
        ");
    $select->execute([$b_id]);

    return $select->fetch(PDO::FETCH_ASSOC);
}

function totalGiroAllTimes(){
    global $db;

    $select = $db->prepare("SELECT SUM(totalAmount) AS total FROM bill");
    $select->execute();

    return $select->fetch(PDO::FETCH_ASSOC);
}