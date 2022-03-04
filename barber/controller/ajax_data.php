<?php

if(isset($_POST['operation'])){
    $operation = $_POST['operation'];
}else{
    die();
}

$result = array();

if($operation=='barber_dayDetail'){
    require_once modal('service');
    require_once modal('bill');
    require_once modal('user');

    $date = post('date');
    $b_id = post('b_id');

    if($date and $b_id){
        $reservations = getBarberOneDayReservation($b_id, $date);

        $response = "";

        foreach($reservations as $row){
            $response .= "<div class='pb-2'>";
            $response .= "<button type='button' class='btn btn-danger' disabled>".orderTime($row['time'])."</button>";
            $response .= getUser($row['c_id'])['name'];
            $response .= " ----- "; 
            $response .= getService($row['s_id'])['name'] . " ";
            $response .= getBillWithReservation($row['r_id']) ? null : "<a href='".barber_url().'create-bill?r_id='.$row['r_id']."' class='btn btn-warning ml-2'>Create Bill</a>";
            $response .= "</div>";
        }

        $result['status'] = 'success';
        $result['item'] = $response;
    }else{
        $result['status'] = 'error';
    }
    
    echo json_encode($result);
}

