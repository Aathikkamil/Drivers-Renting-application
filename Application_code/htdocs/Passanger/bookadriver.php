<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('../assets/bg.jpg');
        backdrop-filter: blur(5px);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: rgba(255, 255, 255, 0.7); /* Adjust the last value (0.7) for transparency */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    h3 {
        text-align: center;
        color: #333;
    }

    .outer-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin: 10px 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: rgba(200, 255, 255, 0.7);
    }

    .inner-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.7);
        margin: 10px 0;
    }

    .inner-card label {
        display: block;
        margin-bottom: 5px;
    }

    .inner-card input[type="text"],
    .inner-card select,
    .inner-card input[type="date"],
    .inner-card input[type="time"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .inner-card button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .inner-card button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<?php
    // ... your PHP code ...
?>
<div class="container">
    <div class="outer-card">
    <h1 style="text-align: center;">Enter the booking details</h1>

        <div class="inner-card">
            <form method="POST" action="process_booking.php">
                <input type="hidden" name="did" value="<?php echo $_GET['driverID']; ?>">
                <label for="pickupLocation">Pick-up Location:</label>
                <input type="text"  name="pickupLocation" >
                <label for="phone">Phone Number:</label>
                <input type="text"  name="phone" >
                <label for="destination">Destination:</label>
                <input type="text"  name="destination" >
                <label for="vehicleType">Vehicle Type:</label>
                <select  name="vehicleType" >
                    <option value="car">Car</option>
                    <option value="van">Van</option>
                    <option value="truck">Truck</option>
                    <option value="tuk-tuk">Tuk-Tuk</option>
                </select>
                <label for="pickupDate">Pick-up Date:</label>
                <input type="date"  name="pickupDate" >
                <label for="pickupTime">Pick-up Time:</label>
                <input type="time"  name="pickupTime" >
                <label for="dropoffTime">Return Time:</label>
                <input type="time"  name="dropoffTime" >
                <label for="dropoffDate">Return Date:</label>
                <input type="date"  name="dropoffDate" >
                <button type="submit">Book Driver</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
