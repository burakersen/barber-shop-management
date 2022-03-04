<?php require admin_view('static/header'); ?>

<div class="container">
    <div>
        <a href="<?=admin_url().'edit-service?req=add'?>" class="btn btn-primary">Add Service</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Cost</th>
            <th scope="col">Price</th>
            <th scope="col">Active</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($services as $service): ?>
            <tr>
                <th scope="row">#<?=$service['s_id']?></th>
                <td><?=$service['name']?></td>
                <td><?=$service['description']?></td>
                <td><?=money_f($service['cost'])?></td>
                <td><?=money_f($service['price'])?></td>
                <td><?=isActive($service['isActive'])?></td>
                <td><a href="<?=admin_url().'edit-service?req=edit&s_id='.$service['s_id']?>" class="btn btn-warning">Edit</a></td>
                <td><a href="<?=admin_url().'services?req='.($service['isActive']==0 ? 'active' : 'noactive').'&s_id='.$service['s_id']?>" class="btn btn-danger"><?=($service['isActive']==0 ? 'Active' : 'No Active')?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require admin_view('static/footer'); ?>