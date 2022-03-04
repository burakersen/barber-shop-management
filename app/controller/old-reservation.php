<?php
if(!session('c_id')){
    header("Location: " . site_url());
    exit();
} 

$meta = [
    'title' => 'Barbershop Old Reservations'
];

require_once modal('reservation');

if(get('req')=='delete' && get('r_id')){
    cancelReservation(get('r_id'));
    header("Location: " . site_url().'old-reservation');
    exit();
}

$oldReservations = getUserAllDoneReservation(session('c_id'));

$onComingReservations = getUserAllOnComingReservation(session('c_id'));

require view('old-reservation');