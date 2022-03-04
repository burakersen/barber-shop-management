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
        <input type="hidden" name="adr_id" value="<?=@$address['adr_id']?>">
        <input type="hidden" name="req" value="<?=@get('req')?>">
        <div class="form-group">
            <label>Zip Code</label>
            <input type="text" class="form-control" name="zipCode" value="<?=@$address['zipCode']?>">
        </div>
        <div class="form-group">
            <label>Country</label>
            <input type="text" class="form-control" name="country" value="<?=@$address['country']?>">
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" value="<?=@$address['city']?>">
        </div>
        <div class="form-group">
            <label>Street</label>
            <input type="text" class="form-control" name="street" value="<?=@$address['street']?>">
        </div>
        <div class="form-group">
            <label>Apartment Number</label>
            <input type="text" class="form-control" name="apartmentNumber" value="<?=@$address['apartmentNumber']?>">
        </div>
        <div class="form-group">
            <label>Number</label>
            <input type="text" class="form-control" name="number" value="<?=@$address['number']?>">
        </div>
        <div class="form-group mt-2">
            <button type="submit" name="submit" value="1" class="btn btn-primary form-control">SEND</button>
        </div>
    </form>
</div>
<?php require barber_view('static/footer'); ?>