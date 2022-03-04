<?php
function admin_controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function admin_view($viewName){
    $viewName = strtolower($viewName);
    return PATH . '/admin/view/' . $viewName . '.php';
}

function admin_url($url = false){
    return URL . '/admin/' . $url;
}

function admin_public_url($url = false){
    return URL . '/public/admin/' . $url;
}
