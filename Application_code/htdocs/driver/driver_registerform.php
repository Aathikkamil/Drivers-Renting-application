<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <?php require_once('../setup/head.php'); ?>

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

<div class="container   ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="../setup/require.php" method="post" class="p-3 border" enctype="multipart/form-data"  >
                <h3>Register Now</h3>

                <div class="form-group">
    <label for="name">Name:</label> <!-- Label for the Name input -->
    <input type="text" name="name" class="form-control" required placeholder="Enter your name">
</div>

<div class="form-group">
    <label for="phone">Phone:</label> <!-- Label for the Phone input -->
    <input type="text" name="phone" class="form-control" required placeholder="Enter your contact number">
</div>


<div class="form-group">
    <label for="age">Age:</label> <!-- Label for the Age input -->
    <input type="text" name="age" class="form-control" required placeholder="Enter your age">
</div>

<div class="form-group">
    <label for="nic">NIC Number:</label> <!-- Label for the NIC Number input -->
    <input type="text" name="nic" class="form-control" required placeholder="Enter your NIC number">
</div>

<div class="form-group">
    <label for="licen">License Number:</label> <!-- Label for the License Number input -->
    <input type="text" name="licen" class="form-control" required placeholder="Enter your license number">
</div>

<div class="form-group">
    <label for="vtype">Vehicle Type:</label>
    <div class="checkbox-group">
        <input type="checkbox" name="vtype[]" value="car" id="car">
        <label for="car">Car</label>
        
        <input type="checkbox" name="vtype[]" value="van" id="van">
        <label for="van">Van</label>
        
        <input type="checkbox" name="vtype[]" value="truck" id="truck">
        <label for="truck">Truck</label>
        
        <input type="checkbox" name="vtype[]" value="tucktuck" id="tucktuck">
        <label for="tucktuck">Tuck Tuck</label>
    </div>
</div>


<div class="form-group">
    <label for="address">Select Address:</label>
    <select name="address" class="form-control" required>
        <option value="Kandy">Kandy</option>
        <option value="Nuwara Eliya">Nuwara Eliya</option>
        <option value="Matale">Matale</option>
        <option value="Gampola">Gampola</option>
        <option value="Hatton">Hatton</option>
        <option value="Dambulla">Dambulla</option>
        <option value="Nawalapitiya">Nawalapitiya</option>
        <option value="Kadugannawa">Kadugannawa</option>
    </select>
</div>
<div class="form-group">
        <label for="profileImage">Profile Picture:</label>
        <input type="file" name="profileImage" class="form-control" accept="image/*">
    </div>


<div class="form-group">
    <label for="licen">password</label> <!-- Label for the License Number input -->
    <input type="password" name="password" required placeholder="enter your password">
</div>
<div class="form-group">
    <label for="licen">password</label> <!-- Label for the License Number input -->
    <input type="password" name="cpassword" required placeholder="confirm your password">
</div>


                <button type="submit" name="submit" class="btn btn-primary form-control">Register Now</button>
                <p class="mt-3">Already have an account? <a href="login_form.php">Login Now</a></p>
            </form>
        </div>
    </div>
</div>

</body>
</html>
