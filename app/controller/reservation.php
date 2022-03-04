<?php
if(!session('c_id')){
    header("Location: " . site_url());
    exit();
} 

$meta = [
    'title' => 'Barbershop Make Reservation'
];

require_once modal('barber');
$visibleBarbers = false;

if(!get('barber')){
    $visibleBarbers = true;
    $barbers = activeBarbers();
}else{
    require_once modal('service');
    $barber = getBarber(get('barber'));
    $services = activeServices();
    
    if(get('month') and get('year')){
        $month = get('month');
        $year = get('year');
    }else{
        $dateComponents = getdate();
        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];
    }
}



require view('reservation');