<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        /* CSS for positioning the form */
        .container {
            position: relative;
        }

        #reservationForm {
            position: absolute;
            top: 0%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Add a shadow */
        }

        .footer {

            margin-top: 200px;
            height: 100px;
            width: 100%;
            background-color: #6f7af2;
            color: white;
            text-align: center;
            }


            @media screen and (max-width: 760px) {
                .footer {
                margin-top: 350px;
                }
            }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Doctor Reservation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="bg.jpg" alt="Los Angeles" class="d-block w-100">
        </div>
    </div>
</div>
<div class="container mt-5 ">
    <form id="reservationForm" method="post" action="reserve_seat.php" class="row g-3" onsubmit="return validateForm()">
        <h1 class="mb-4 text-center">Doctor Appointment Reservation</h1>
        <div class="col-md-5 mb-3">
            <label for="doctor" class="form-label">Select a Doctor:</label>
            <select id="doctor" name="doctor" class="form-select" required>
                <option value="">Select a Doctor</option>
                <option value="dr_smith">Dr. Smith</option>
                <option value="dr_jones">Dr. Jones</option>
                <option value="dr_doe">Dr. Doe</option>
            </select>
        </div>
        <div class="col-md-5 mb-3">
            <label for="date" class="form-label">Select a Date:</label>
            <input type="date" id="date" name="date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="col-md-2 pt-4">
            <button type="submit" class="btn btn-primary">Check</button>
        </div>
    </form>
</div>
<div class="footer">
  <p>Footer</p>
</div>
<script>
    function validateForm() {
        const doctorField = document.getElementById('doctor');
        const dateField = document.getElementById('date');

        if (doctorField.value === "" || dateField.value === "") {
            alert('All fields are required. Please fill them out.');
            return false;
        }

        return true;
    }
</script>
</body>
</html>