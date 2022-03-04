<?php

$meta = [
    'title' => 'Barbershop Admin Giro'
];
require_once modal('bill');

$dailyGiro = getOneBarberdailyGiro(get('b_id'));
$monthlyGiro = getOneBarbermonthlyGiro(get('b_id'));
$yearlyGiro = getOneBarberyearlyGiro(get('b_id'));

require admin_view('giro');