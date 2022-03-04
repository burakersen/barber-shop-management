<?php require view('static/header'); ?>

<div class="container d-flex flex-wrap">
    <?php foreach($barbers as $barber): ?>
        <div class="card mx-3 mb-3" style="width: 18rem;">
            <img class="card-img-top" src="<?=public_url().'img/barber.svg'?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$barber['name'] ?></h5>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require view('static/footer'); ?>