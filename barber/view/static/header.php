<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$meta['title']?></title>
    <link href="<?=public_url('css/bootstrap/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=public_url('css/sweetalert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=public_url('css/style.css')?>" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <div class="container p-2 d-flex justify-content-between mb-4">
        <div class="logo d-flex align-items-center">
            <a href="<?=barber_url()?>" class="link-white logo-link">Barbershop</a>
            <?php if(session('barber_login')) : ?>
                <div style="margin-left: 30px;">
                    <a href="<?=barber_url()?>bills" class="link-white px-3">Bill</a>
                    <a href="<?=barber_url()?>reservations" class="link-white px-3">Reservations</a>
                    <a href="<?=barber_url()?>giro" class="link-white px-3">Giro</a>
                    <a href="<?=barber_url()?>addresses" class="link-white px-3">Addresses</a>
                </div>
            <?php endif; ?>
        </div>
        <?php if(session('barber_login')) : ?>
            <div>
                <button class="btn btn-primary"><a href="<?=site_url().'logout'?>">Logout</a></button>
            </div>
        <?php endif; ?>
    </div>
</nav>

