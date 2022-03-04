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
            <a href="<?=site_url()?>" class="link-white logo-link">Barbershop</a>
           
            <div style="margin-left: 30px;">
                <a href="<?=site_url()?>barbers" class="link-white px-3">Barbers</a>
                <a href="<?=site_url()?>services" class="link-white px-3">Services</a>

                <?php if(session('c_id')) : ?>
                    <a href="<?=site_url()?>reservation" class="link-white px-3">Make Reservation</a>
                    <a href="<?=site_url()?>old-reservation" class="link-white px-3">Old Reservations</a>
                <?php endif; ?>

            </div>
           
        </div>
        <div>
            
        </div>
        <?php if(session('c_id')) : ?>
            <div>
                <button class="btn btn-primary"><a href="<?=site_url().'logout'?>">Logout</a></button>
            </div>
        <?php endif; ?>
    </div>
</nav>

