<?php
$meta = [
    'title' => 'Barbershop Barbers'
];

require_once modal('barber');

$barbers = activeBarbers();

require view('barbers');