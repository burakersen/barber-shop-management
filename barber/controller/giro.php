<?php

$meta = [
    'title' => 'Barbershop Giro'
];
require_once modal('bill');

$dailyGiro = getOneBarberdailyGiro(session('barber_login'));
$monthlyGiro = getOneBarbermonthlyGiro(session('barber_login'));
$yearlyGiro = getOneBarberyearlyGiro(session('barber_login'));

require barber_view('giro');