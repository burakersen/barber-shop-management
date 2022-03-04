<?php require admin_view('static/header'); ?>

<div class="container">
    <div>
        Total Customer : <?=$totalCustomer['total']?>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone Number</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($customers as $customer): ?>
            <tr>
                <th scope="row">#<?=$customer['c_id']?></th>
                <td><?=$customer['name']?></td>
                <td><?=$customer['phoneNumber']?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require admin_view('static/footer'); ?>