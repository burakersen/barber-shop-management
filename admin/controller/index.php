<?php

$meta = [
    'title' => 'Barbershop Admin'
];

require_once modal('barber');
require_once modal('reservation');
require_once modal('bill');

$query_1 = count(leftBarbers());
$query_2 = getAllOnComingReservationCount();
$query_3 = getMostComingCustomer();
$query_4 = getBarbersOneMonthReservationCount();
$query_5 = getMostPreferedServiceOneMonth();
$query_6 = totalGiroAllTimes();

require admin_view('index');