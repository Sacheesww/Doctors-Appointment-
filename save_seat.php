<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="assets/img/new/logo.jpg" type="image/png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="j25FcvEA"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $selectedTimeSlot = $_POST["time"];
        $doctor = $_POST["doctor"];
        $date = $_POST["date"];
        $userName = $_POST["userName"];

        $savetime=$selectedTimeSlot+1;
        $showtime=$selectedTimeSlot+2;

        $conn = new mysqli("localhost", "root", "", "doctor");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO reservations (D_Name, Date, Time, P_Name) VALUES ('$doctor', '$date', '$savetime', '$userName')";

        if ($conn->query($sql) === true) {
            $successMessage = "Patient Name: $userName\\nDoctor Name: $doctor\\nBooked Date: $date\\nBooked Time: $savetime.00-$showtime.00";

            echo '<script language="javascript">';
            echo "swal({
                title: 'Reservation Success!',
                text: '$successMessage',
                type: 'success',
                timer: 5000,
                showConfirmButton: false
                }, function(){
                    window.location.href = 'http://localhost/doctor/index.php';
                });";
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'swal({
            title: "Error!",
            text: "Redirecting in 2 seconds.",
            type: "error",
            timer: 2000,
            showConfirmButton: false
            }, function(){
                    window.location.href = "http://localhost/doctor/index.php";
            });';
            echo '</script>';
        }

        $conn->close();
    } else {
        echo 'Error: Invalid request method.';
    }
?>
</body>
</html>