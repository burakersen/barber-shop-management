<?php require barber_view('static/header'); ?>

<div class="container">
    <div>
        <a href="<?=barber_url().'edit-address?req=add'?>" class="btn btn-primary">Add Address</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Street</th>
            <th scope="col">Apartment Number</th>
            <th scope="col">Number</th>
            <th scope="col">Edit</th>
            <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($addresses as $address): ?>
            <tr>
                <th scope="row">#<?=$address['adr_id']?></th>
                <td><?=$address['zipCode']?></td>
                <td><?=$address['country']?></td>
                <td><?=$address['city']?></td>
                <td><?=$address['street']?></td>
                <td><?=$address['apartmentNumber']?></td>
                <td><?=$address['number']?></td>
                <td><a href="<?=barber_url().'edit-address?req=edit&adr_id='.$address['adr_id']?>" class="btn btn-warning">Edit</a></td>
                <td><a href="<?=barber_url().'addresses?req=delete&adr_id='.$address['adr_id']?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require barber_view('static/footer'); ?>