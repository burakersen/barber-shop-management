<?php

$meta = [
    'title' => 'Barbershop Admin Edit Barbers'
];
require_once modal('barber');

if(post('submit')){
    $data = [
        'name' => post('name'),
        'phoneNumber' => post('phoneNumber'),
        'password' => post('password')
    ];
    
    $insert = signInBarber($data);

    if($insert>0){
        $success = true;
        $postText = "Barber added";
    }else{
        $error = true;
        $postText = "Barber not added";
    }
}

require admin_view('edit-barber');