<?php
$meta = [
    'title' => 'Welcome Barbershop'
];

if(!session('c_id')){
    $route[0] = 'login';
}else{
    $route[0] = 'index';
}


require view($route[0]);