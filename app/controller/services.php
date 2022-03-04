<?php
$meta = [
    'title' => 'Barbershop Services'
];
require_once modal('service');

$services = activeServices();

require view('services');