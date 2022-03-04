<?php require admin_view('static/header'); ?>

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
        <input type="hidden" name="req" value="<?=@get('req')?>">
        <input type="hidden" name="s_id" value="<?=@get('s_id')?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?=@$service['name']?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="<?=@$service['description']?>">
        </div>
        <div class="form-group">
            <label>Cost</label>
            <input type="text" class="form-control" name="cost" value="<?=@$service['cost']?>">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" value="<?=@$service['price']?>">
        </div>
        <div class="form-group mt-2">
            <button type="submit" name="submit" value="1" class="btn btn-primary form-control">SEND</button>
        </div>
    </form>
</div>
<?php require admin_view('static/footer'); ?>