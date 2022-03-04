<?php require barber_view('static/header'); ?>

<div class="container d-flex justify-content-center flex-column">
    <?php if(isset($success)): ?>
        <div class="alert alert-success" role="alert">
            <?=$postText?>
        </div>
    <?php endif; ?>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?=$postText?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="hidden" name="r_id" value="<?=$reservation['r_id']?>">
        <input type="hidden" name="date" value="<?=$reservation['date']?>">
        <input type="hidden" name="price" value="<?=$reservation['price']?>">

        <div class="form-group">
            <label>Barber Name</label>
            <input type="text" class="form-control" name="barberName" value="<?=@$reservation['barberName']?>" readonly>
        </div>
        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" class="form-control" name="customerName" value="<?=@$reservation['customerName']?>" readonly>
        </div>
        <div class="form-group">
            <label>Service Name</label>
            <input type="text" class="form-control" name="serviceName" value="<?=@$reservation['serviceName']?>" readonly>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date2" value="<?=($reservation!=null ? orderDate($reservation['date']) : null)?>" readonly>
        </div>
        <div class="form-group">
            <label>Time</label>
            <input type="text" class="form-control" name="time" value="<?=($reservation!=null ? orderTime($reservation['time']) : null)?>" readonly>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price2" value="<?=($reservation!=null ? money_f($reservation['price']) : null)?>" readonly>
        </div>
        <div class="form-group">
            <label>Discount</label>
            <input type="text" class="form-control" name="discountAmount" value="0.00">
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary form-control">SEND</button>
        </div>
    </form>
</div>
<?php require barber_view('static/footer'); ?>