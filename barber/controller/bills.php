<?php

$meta = [
    'title' => 'Barbershop Bills'
];

require_once modal('bill');

$bills = getOneBarberAllBills(session('barber_login'));

require barber_view('bills');