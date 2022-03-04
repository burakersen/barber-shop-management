<?php

$meta = [
    'title' => 'Barbershop Addresses'
];

require_once modal('barber');

if(post('submit')){
    $post_req = post('req');
    $adr_id = post('adr_id');
    $zipCode = post('zipCode');
    $country = post('country');
    $city = post('city');
    $street = post('street');
    $apartmentNumber = post('apartmentNumber');
    $number = post('number');
    
    $data = [
        'b_id' => session('barber_login'),
        'adr_id' => $adr_id,
        'zipCode' => $zipCode,
        'country' => $country,
        'city' => $city,
        'street' => $street,
        'apartmentNumber' => $apartmentNumber,
        'number' => $number,
    ];

    if($post_req=="edit"){
        $update = updateBarberAddress($data);

        if($update){
            $success = true;
            $postText = "Address updated";
        }else{
            $error = true;
            $postText = "Address not updated";
        }
    }
    
    if($post_req=="add"){
        $insert = addBarberAddress($data);

        if($insert){
            $success = true;
            $postText = "Address added";
        }else{
            $error = true;
            $postText = "Address not added";
        }
    }
}

if(get('req')=='add'){


}elseif(get('req')=='edit' && get('adr_id')){
    $address = getOneBarberOneAddress(session('barber_login'), get('adr_id'));

}

require barber_view('edit-address');