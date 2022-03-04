<?php

$meta = [
    'title' => 'Barbershop Admin Services'
];

require_once modal('service');

if((get('req')=='noactive') && (get('s_id'))){
    makeNoActiveService(get('s_id'));
    header("Location: " . admin_url().'services');
    exit();
}

if((get('req')=='active') && (get('s_id'))){
    makeYesActiveService(get('s_id'));
    header("Location: " . admin_url().'services');
    exit();
}

$services = allServices();

require admin_view('services');