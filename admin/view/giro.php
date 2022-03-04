<?php require admin_view('static/header'); ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            Daily Giro : <?=money_f($dailyGiro['total'])?>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            Monthly Giro : <?=money_f($monthlyGiro['total']);?>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            Yearly Giro : <?=money_f($yearlyGiro['total']);?>
        </div>
    </div>
</div>

<?php require admin_view('static/footer'); ?>