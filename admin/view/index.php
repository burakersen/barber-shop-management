<?php require admin_view('static/header'); ?>

<div class="container">
    <h1 class="text-center">Welcome Admin</h1>
    <h4 class="mb-5">Advanced Queries From Part-1</h4>

    <div class="row">
        <h5>Count of barber that has worked before and left : <span><b><?=$query_1?></b></span></h5>
    </div>

    <hr>

    <div class="row">
        <h5>Count of active pending reservations : <span><b><?=$query_2?></b></span></h5>
    </div>

    <hr>
    
    <div class="row">
        <h5>Most made reservation customer : <span><b><?=$query_3['name']." -- " . $query_3['magnitude'] . ' times'?> </b></span></h5>
    </div>

    <hr>

    <div class="row">
        <h5>How many reservations are barbers gets in the last 30 days :<br />
        <?php foreach($query_4 as $row): ?>
            <span><b><?=$row['name']." -- " . $row['magnitude'] . ' reservations'?> </b></span><br />
        <?php endforeach; ?>
        </h5>
    </div>

    <hr>

    <div class="row">
        <h5>The most preferred service in the last 30 days : <span><b><?=$query_5['name']." -- " . $query_5['magnitude'] . ' times'?> </b></span></h5>
    </div>

    <hr>

    <div class="row">
        <h5>Total giro all times : <span><b><?=money_f($query_6['total'])?> </b></span></h5>
    </div>

</div>

<?php require admin_view('static/footer'); ?>