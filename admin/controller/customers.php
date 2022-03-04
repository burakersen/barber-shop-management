<?php

$meta = [
    'title' => 'Barbershop Admin Customers'
];
require_once modal('user');

$customers = alllCustomers();
$totalCustomer = totalCustomer();

require admin_view('customers');