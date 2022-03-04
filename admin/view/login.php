<?php require admin_view('static/header'); ?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="col-md-6 d-flex align-items-center flex-column">
        <h2 class="h4">Admin Sign-In</h2>
        <div class="col-md-8">
            <form action="" method="post" id="signinAdminForm">
                <input type="hidden" name="operation" value="signinAdmin">
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="phoneNumber" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <input type="submit" class="btn btn-primary form-control" value="Sign In">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require admin_view('static/footer'); ?>