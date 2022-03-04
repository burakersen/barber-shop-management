<?php

$meta = [
    'title' => 'Barbershop Admin Bills'
];
require_once modal('bill');

$bills = getOneBarberAllBills(get('b_id'));

require admin_view('bills');