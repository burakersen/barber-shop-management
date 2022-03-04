<?php

function buildCalendar($month, $year, $b_id=null){
    global $db;
    require modal('reservation');
    $barber_query = "";
    if($b_id) $barber_query = "barber=".$b_id."&";
    
    $select = $db->prepare("SELECT date FROM reservation WHERE b_id = ? AND MONTH(date) = ? AND YEAR(date) = ?");
    $select->execute([$b_id, $month, $year]);

    $bookings = array();

    if($select->rowCount()>0){
        $selected = $select->fetchAll(PDO::FETCH_ASSOC);
        foreach($selected as $row){
            array_push($bookings, $row['date']);
        }
    }

    $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];
    if($dayOfWeek==0){
        $dayOfWeek = 6;
    }else{
        $dayOfWeek = $dayOfWeek-1;
    }

    $dateToday = date('Y-m-d');

    $calendar  = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='".site_url()."reservation?".$barber_query."month=".date('m', mktime(0,0,0,$month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a>";
    $calendar .= "<a class='btn btn-xs btn-primary mx-5' href='".site_url()."reservation?".$barber_query."month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='".site_url()."reservation?".$barber_query."month=".date('m', mktime(0,0,0,$month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    $calendar .= "<tr>";

    foreach($daysOfWeek as $day){
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr>";

    if($dayOfWeek>0){
        for($i = 0; $i<$dayOfWeek; $i++){
            $calendar .= "<td></td>";
        }
    }

    $currentDay = 1;

    $month = str_pad($month,2,"0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay,2,"0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayName = strtolower(date('l', strtotime($date)));
        $today = $date==date('Y-m-d') ? "today" : "";

        if($dayName=="sunday"){
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-xs btn-danger'>Holiday</button>";
        }elseif($date<date("Y-m-d")){
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-xs btn-danger'>N/A</button>";
        }else{
            $totalBookings = checkTime($b_id, $date);;
            if($totalBookings==13){
                $calendar .= "<td class='$today'><h4>$currentDay</h4><a class='btn btn-xs btn-danger' href='#'>All Booked</a>";
            }else{
                $calendar .= "<td class='$today'><h4>$currentDay</h4><a class='btn btn-xs btn-success book' href='date=".$date."&b_id=".$b_id."'>Book</a>";
            }
            
        }
        
        $calendar .= "</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if($daysOfWeek !=7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.= "<td></td>";
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}

function timeSlot(){
    $start = new DateTime(START);
    $end = new DateTime(END);
    $interval = new DateInterval("PT" . DURATION . "M");
    $cleanupInterval = new DateInterval("PT" . CLEANUP . "M");

    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }

        $slots[] = $intStart->format("H:i");
    }

    return $slots;
}

function orderDate($date){
    $explode = explode('-', $date);
    return $explode[2].'/'.$explode[1].'/'.$explode[0];
}

function orderTime($time){
    $explode = explode(':', $time);
    return $explode[0].':'.$explode[1];
}

function buildBarberCalendar($month, $year, $b_id=null){
    global $db;
    require modal('reservation');
    $barber_query = "";
    if($b_id) $barber_query = "barber=".$b_id."&";
    
    $select = $db->prepare("SELECT date FROM reservation WHERE b_id = ? AND MONTH(date) = ? AND YEAR(date) = ?");
    $select->execute([$b_id, $month, $year]);

    $bookings = array();

    if($select->rowCount()>0){
        $selected = $select->fetchAll(PDO::FETCH_ASSOC);
        foreach($selected as $row){
            array_push($bookings, $row['date']);
        }
    }

    $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];
    if($dayOfWeek==0){
        $dayOfWeek = 6;
    }else{
        $dayOfWeek = $dayOfWeek-1;
    }

    $dateToday = date('Y-m-d');

    $calendar  = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='".barber_url()."reservations?".$barber_query."month=".date('m', mktime(0,0,0,$month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a>";
    $calendar .= "<a class='btn btn-xs btn-primary mx-5' href='".barber_url()."reservations?".$barber_query."month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='".barber_url()."reservations?".$barber_query."month=".date('m', mktime(0,0,0,$month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    $calendar .= "<tr>";

    foreach($daysOfWeek as $day){
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr>";

    if($dayOfWeek>0){
        for($i = 0; $i<$dayOfWeek; $i++){
            $calendar .= "<td></td>";
        }
    }

    $currentDay = 1;

    $month = str_pad($month,2,"0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay,2,"0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayName = strtolower(date('l', strtotime($date)));
        $today = $date==date('Y-m-d') ? "today" : "";

        if($dayName=="sunday"){
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-xs btn-danger'>Holiday</button>";
        }else{
            $totalBookings = checkTime($b_id, $date);;
            if($totalBookings==13){
                $calendar .= "<td class='$today'><h4>$currentDay</h4><a class='btn btn-xs btn-danger' href='#'>All Booked</a>";
            }else{
                $calendar .= "<td class='$today'><h4>$currentDay</h4><a class='btn btn-xs btn-success barber-see' href='date=".$date."&b_id=".$b_id."'>See</a>";
            }
            
        }
        
        $calendar .= "</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if($daysOfWeek !=7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.= "<td></td>";
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}