<?php require view('static/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center flex-column">
            <h2 class="h4">Register</h2>
            <div class="col-md-8">
                <form action="" method="post" id="registerForm">
                    <input type="hidden" name="operation" value="register">
                    <div class="form-group">
                        <label>Fullname:</label>
                        <input type="text" name="fullName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phoneNumber" class="form-control" maxlength="10" placeholder="Max-length is 10!" required>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control" minlength="6" minlength="15" required>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary form-control" value="Register">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center flex-column">
            <h2 class="h4">Sign in</h2>
            <div class="col-md-8">
                <form action="" method="post" id="signinForm">
                    <input type="hidden" name="operation" value="signin">
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
</div>

<?php require view('static/footer'); ?>
