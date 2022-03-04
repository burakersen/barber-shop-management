<?php
function barber_controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/barber/controller/' . $controllerName . '.php';
}

function barber_view($viewName){
    $viewName = strtolower($viewName);
    return PATH . '/barber/view/' . $viewName . '.php';
}

function barber_url($url = false){
    return URL . '/barber/' . $url;
}

function barber_public_url($url = false){
    return URL . '/public/barber/' . $url;
}
