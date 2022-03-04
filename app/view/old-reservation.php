<?php require view('static/header'); ?>

<div class="container">
    <h2 class="h4">Oncoming Reservations</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Barber</th>
                <th scope="col">Service</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Cancel</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($onComingReservations as $r): ?>
            <tr>
                <th scope="row">#<?=$r['r_id']?></th>
                <td><?=$r['barberName']?></td>
                <td><?=$r['serviceName']?></td>
                <td><?=orderDate($r['date'])?></td>
                <td><?=orderTime($r['time'])?></td>
                <td><a href="<?=site_url().'old-reservation?req=delete&r_id='.$r['r_id']?>" class="btn btn-danger">Cancel</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h2 class="h4">Old Reservations</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Barber</th>
                <th scope="col">Service</th>
                <th scope="col">Discount</th>
                <th scope="col">Paid</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($oldReservations as $r): ?>
            <tr>
                <th scope="row">#<?=$r['r_id']?></th>
                <td><?=$r['barberName']?></td>
                <td><?=$r['serviceName']?></td>
                <td><?=money_f($r['discountAmount'])?></td>
                <td><?=money_f($r['totalAmount'])?></td>
                <td><?=orderDate($r['date'])?></td>
                <td><?=orderTime($r['time'])?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require view('static/footer'); ?>