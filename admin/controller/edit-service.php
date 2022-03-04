<?php

$meta = [
    'title' => 'Barbershop Admin Edit Service'
];
require_once modal('service');

if(post('submit')){
    $req = post('req');

    $data = [
        's_id' => post('s_id'),
        'name' => post('name'),
        'description' => post('description'),
        'cost' => post('cost'),
        'price' => post('price'),
        'isActive' => 1
    ];

    if($req=='add'){
        $insert = addService($data);

        if($insert>0){
            $success = true;
            $postText = "Service added";
        }else{
            $error = true;
            $postText = "Service not added";
        }
    }elseif($req=='edit'){
        $update = updateService($data);
        
        if($update>0){
            $success = true;
            $postText = "Service updated";
        }else{
            $error = true;
            $postText = "Service not updated";
        }
    }
}

$service = getService(get('s_id'));

require admin_view('edit-service');