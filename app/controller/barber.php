<?php
if(!route(1)){
    $route[1] = 'index';
}

if(!file_exists(barber_controller(route(1)))){
    $route[1] = 'index';
}

if(!session('barber_login')){
    $route[1] = 'login';
}else{
    require_once modal('barber');
    $barber = getBarber(session('barber_login'));

    $barber_name = $barber['name'];
}


require barber_controller($route[1]);