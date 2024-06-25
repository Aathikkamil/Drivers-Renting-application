
<head>
    <title> Login </title>
<?php require_once('../setup/head.php');?>
<style>
        /* Center the form */
        .center-content {
            display: flex;
            justify-content: center;
        }
        body {
            background-image: url('../assets/dv.jpg');
            background-size: cover; /* Adjusts the image size to cover the entire background */
            background-repeat: no-repeat; /* Prevents the image from repeating */
        }
        .container {
    max-width: 800px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.5) for transparency */
    padding: 20px;
    border-radius: 5px;
    
}
    </style>

</head>
<body>
   




   <center>

   <div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <form action="../setup/driverlogin.php" autocomplete="off" method="post" class="p-3 border">
                <h3>Drivers Login now</h3>
                <div class="form-group">
                <input type="text" name="nic" class="form-control" required placeholder="Enter your NIC number">
                </div>
                <div class="form-group">
                    <input type="password" name="password" required class="form-control" placeholder="Enter your password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Login now</button>
                <p class="mt-3">Don't have an account? <a href="../driver/driver_registerform.php">Register now</a></p>
            </form>
        </div>
    </div>
</div>
</center>

</body>
</html>