<?php

$meta = [
    'title' => 'Create Bill'
];

$reservation = [];

if($_POST){
    require_once modal('bill');

    $r_id = post('r_id');
    $date = post('date');
    $price = post('price');
    $discountAmount = post('discountAmount');

    if($r_id && $date && $price && $discountAmount){
        $data = [
            'r_id' => $r_id,
            'date' => $date,
            'discountAmount' => $discountAmount,
            'totalAmount' => floatval($price - $discountAmount)
        ];
        $bill = createBill($data);

        if($bill!=-1){
            $success = true;
            $postText = "Bill created";
        }else{
            $error = true;
            $postText = "Bill not created";
        }
    }
}

require_once modal('reservation');
if(get('r_id')){
    $reservation = getOneReservationDetail(get('r_id'));
}



require barber_view('create-bill');