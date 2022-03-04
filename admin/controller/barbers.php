<?php

$meta = [
    'title' => 'Barbershop Admin Barbers'
];
require_once modal('barber');

if((get('req')=='noactive') && (get('b_id'))){
    makeNoActiveBarber(get('b_id'));
    header("Location: " . admin_url().'barbers');
    exit();
}

if((get('req')=='active') && (get('b_id'))){
    makeYesActiveBarber(get('b_id'));
    header("Location: " . admin_url().'barbers');
    exit();
}

$barbers = alllBarbers();

require admin_view('barbers');