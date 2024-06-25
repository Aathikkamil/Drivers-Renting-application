

<head>
    <title> register </title>
<?php require_once('setup/head.php');?>
<style>
   body {
            background-image: url('../assets/dv.jpg');
            background-size: cover; /* Adjusts the image size to cover the entire background */
            background-repeat: no-repeat; /* Prevents the image from repeating */
        }
            .container {
    max-width: 1000px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.5) for transparency */
   
    border-radius: 5px;
    
}
</style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="setup/requer.php" method="post">
                <h3 class="mb-4">User Register Now</h3>
                <div class="form-group">
                    <input type="text" name="name" required class="form-control" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" required class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" required class="form-control" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <input type="password" name="cpassword" required class="form-control" placeholder="Confirm your password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Register Now</button>
                <p class="mt-3">Already have an account? <a href="login_form.php">Login Now</a></p>
            </form>
        </div>
    </div>
</div>

</body>
</html>