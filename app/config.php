<?php
define('PATH', realpath('.'));
define('SUBFOLDER', true);
define('URL', 'http://localhost/barbershop');

define('DURATION', 30);
define('CLEANUP', 15);
define('START', "09:00");
define('END', "19:00");

return [
    'db' => [
        'name' => 'barber_shop',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => ''
    ]
];