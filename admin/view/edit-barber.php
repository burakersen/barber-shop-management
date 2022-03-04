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
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="name" >
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phoneNumber">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <div class="form-group mt-2">
            <button type="submit" name="submit" value="1" class="btn btn-primary form-control">SEND</button>
        </div>
    </form>
</div>
<?php require admin_view('static/footer'); ?>