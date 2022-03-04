<?php

$meta = [
    'title' => 'Reservations'
];

if(get('month') and get('year')){
    $month = get('month');
    $year = get('year');
}else{
    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
}

require barber_view('reservations');