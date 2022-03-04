<?php

$meta = [
    'title' => 'Barbershop Addresses'
];

if(get('adr_id')){
    deleteBarberAddress(get('adr_id'));
    header("Location:".barber_url().'addresses');
    exit();
}

$addresses = getOneBarberAllAddresses(session('barber_login'));

require barber_view('addresses');