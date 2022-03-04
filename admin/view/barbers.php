<?php require admin_view('static/header'); ?>

<div class="container">
    <div>
        <a href="<?=admin_url().'edit-barber?req=add'?>" class="btn btn-primary">Add Barber</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Started Date</th>
            <th scope="col">Active</th>
            <th scope="col">Bills</th>
            <th scope="col">Giro</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($barbers as $barber): ?>
            <tr>
                <th scope="row">#<?=$barber['b_id']?></th>
                <td><?=$barber['name']?></td>
                <td><?=orderDate($barber['startedDate'])?></td>
                <td><?=isActive($barber['isActive'])?></td>
                <td><a href="<?=admin_url().'bills?b_id='.$barber['b_id']?>" class="btn btn-warning">Bills</a></td>
                <td><a href="<?=admin_url().'giro?b_id='.$barber['b_id']?>" class="btn btn-info">Giro</a></td>
                <td><a href="<?=admin_url().'barbers?req='.($barber['isActive']==0 ? 'active' : 'noactive').'&b_id='.$barber['b_id']?>" class="btn btn-danger"><?=($barber['isActive']==0 ? 'Active' : 'No Active')?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require admin_view('static/footer'); ?>