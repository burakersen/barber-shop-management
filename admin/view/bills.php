<?php require admin_view('static/header'); ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Barber</th>
            <th scope="col">Customer</th>
            <th scope="col">Service</th>
            <th scope="col">Discount</th>
            <th scope="col">Total</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($bills as $bill): ?>
            <tr>
                <th scope="row">#<?=$bill['bill_id']?></th>
                <td><?=$bill['barberName']?></td>
                <td><?=$bill['customerName']?></td>
                <td><?=$bill['serviceName']?></td>
                <td><?=money_f($bill['discountAmount'])?></td>
                <td><?=money_f($bill['totalAmount'])?></td>
                <td><?=orderDate($bill['date'])?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require admin_view('static/footer'); ?>