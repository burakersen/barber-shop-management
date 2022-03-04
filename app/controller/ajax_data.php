<?php

if(isset($_POST['operation'])){
    $operation = $_POST['operation'];
}else{
    die();
}

$result = array();

if($operation=="signinAdmin"){
    unset($_POST['operation']);
    require_once modal('admin');

    foreach($_POST as $key => $value){
        $_POST[$key] = post($key);
    }

    $validUser = admin_signIn($_POST['phoneNumber'], $_POST['password']);

    if($validUser!=-1){
        $_SESSION['admin_login'] = $validUser;
        $result['status'] = 'success';
        $result['title'] = 'Successfull';
        $result['text'] = 'You are being redirected to the homepage';
    }else{
        $result['status'] = 'error';
        $result['title'] = 'Error';
        $result['text'] = 'Check your login information and try again';
    }

    echo json_encode($result);
}

if($operation=="signinBarber"){
    unset($_POST['operation']);
    require_once modal('barber');

    foreach($_POST as $key => $value){
        $_POST[$key] = post($key);
    }

    $validUser = barber_signIn($_POST['phoneNumber'], $_POST['password']);

    if($validUser!=-1){
        $_SESSION['barber_login'] = $validUser;
        $result['status'] = 'success';
        $result['title'] = 'Successfull';
        $result['text'] = 'You are being redirected to the homepage';
    }else{
        $result['status'] = 'error';
        $result['title'] = 'Error';
        $result['text'] = 'Check your login information and try again';
    }

    echo json_encode($result);
}

if($operation=="register"){
    unset($_POST['operation']);
    require_once modal('user');
    
    foreach($_POST as $key => $value){
        $_POST[$key] = post($key);
    }
    
    if(checkPhoneNumber($_POST['phoneNumber'])!=-1){
        $result['status'] = 'error';
        $result['title'] = 'Invalid Phone Number';
        $result['text'] = 'A user uses this phone number!';
    }else{
        $register = register($_POST['fullName'], $_POST['phoneNumber'], $_POST['password']);

        if($register){
            $result['status'] = 'success';
            $result['title'] = 'Welcome ' . $_POST['fullName'];
            $result['text'] = 'You can signin!';
        }else{
            $result['status'] = 'error';
            $result['title'] = 'Unexpected Error';
            $result['text'] = 'Please try again later';
        }
    }
    
    echo json_encode($result);
}

if($operation=="signin"){
    unset($_POST['operation']);
    require_once modal('user');
    
    foreach($_POST as $key => $value){
        $_POST[$key] = post($key);
    }

    $validUser = signIn($_POST['phoneNumber'], $_POST['password']);
    
    if($validUser!=-1){
        $_SESSION['c_id'] = $validUser;
        $result['status'] = 'success';
        $result['title'] = 'Successfull';
        $result['text'] = 'You are being redirected to the homepage';
    }else{
        $result['status'] = 'error';
        $result['title'] = 'Error';
        $result['text'] = 'Check your login information and try again';
    }
    
    echo json_encode($result);
}

if($operation=="timeSlots"){
    unset($_POST['operation']);
    require_once modal('barber');

    $date = post('date');
    $b_id = post('b_id');

    if($date){
        $bookings = array();
        $reservations = getBarberOneDayReservation($b_id, $date);

        foreach($reservations as $row){
            $bookings[] = substr($row['time'], 0, 5);
        }
    
        $slots = timeSlot();
        $response = "";

        foreach ($slots as $ts) {
            $response .= "<div class='col-md-2 pb-3'>";
            $response .= "<div class='form-group'>";

            if(in_array($ts, $bookings))
                $response .= "<button type='button' class='btn btn-danger' disabled>$ts</button>";
            else
                $response .= "<button type='button' class='btn btn-success times'>$ts</button>";

            $response .= "</div></div>";
        }

        $result['status'] = 'success';
        $result['item'] = $response;
    }else{
        $result['status'] = 'error';
    }
    
    echo json_encode($result);
}

if(($operation=="makeReservation") and session('c_id')){
    require_once modal('reservation');

    $data = [
        'c_id' => session('c_id'),
        'b_id' => post('b_id'),
        's_id' => post('s_id'),
        'date' => post('date'),
        'time' => post('time')
    ];

    $created = makeReservation($data);

    if($created>0){
        $result['status'] = 'success';
        $result['title'] = 'Successfull';
        $result['text'] = 'Reservation created!';
    }else{
        $result['status'] = 'error';
        $result['title'] = 'Error';
        $result['text'] = 'Reservation not created!';
    }

    echo json_encode($result);
}

