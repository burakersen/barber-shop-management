<?php
function modal($modalName){
    $modalName = strtolower($modalName);
    return PATH . '/app/modal/' . $modalName . '.php';
}

function controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/app/controller/' . $controllerName . '.php';
}

function view($viewName){
    $viewName = strtolower($viewName);
    return PATH . '/app/view/' . $viewName . '.php';
}

function route($index){
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}

function setting($name){
    global $settings;
    return isset($settings[$name]) ? $settings[$name] : false ;
}

function session($name){
    return isset($_SESSION[$name]) ? $_SESSION[$name] : false;
}