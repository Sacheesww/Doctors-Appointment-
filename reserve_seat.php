<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Reservation</title>
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
            margin-top: 350px;
            height: 100px;
            width: 100%;
            background-color: #6f7af2;
            color: white;
            text-align: center;
        }

        @media screen and (max-width: 760px) {
            .footer {
                margin-top: 750px;
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
    <div class="container mt-5">
        <form id="reservationForm" method="post" action="save_seat.php" class="row g-3" onsubmit="return validateForm()">
            <div class="container mt-5">
                <h1 class="mb-4">Doctor Seat Reservation</h1>

                <h1>Time Slot Selection</h1>
                <p>Select your preferred time slot:</p>

                <?php
                // Establish a database connection
                $conn = new mysqli("localhost", "root", "", "doctor");

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve the selected doctor and date from the request
                $doctor = $_REQUEST["doctor"];
                $date = $_REQUEST["date"];

                // Query to fetch reserved time slots for the selected doctor and date
                $sql = "SELECT Time FROM reservations WHERE D_Name='$doctor' AND Date='$date'";
                $result = $conn->query($sql);

                // Define available time slots
                $totalTimeSlots = 8;
                $availableTimeSlots = range(1, $totalTimeSlots);

                // Create an array to store formatted time slot strings
                $formattedTimeSlots = [];

                // Fetch the reserved time slots and mark them as unavailable
                $reservedTimeSlots = [];

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $reservedTimeSlots[] = $row["Time"];
                    }
                }

                // Close the database connection
                $conn->close();
                ?>

                <select id='time' name='time' class='form-select' required>
                    <option value=''>Select a Time</option>

                    <?php
                    // Define the time range for each slot (adjust as needed)
                    $startTime = 1; // Starting hour (1:00)
                    $endTime = 2;   // Ending hour (2:00)

                    for ($i = 0; $i < $totalTimeSlots; $i++) {
                        $formattedStartTime = $startTime + $i;
                        $formattedEndTime = $endTime + $i;

                        // Format the time slots as "1:00 - 2:00", "2:00 - 3:00", and so on
                        $formattedTimeSlot = "$formattedStartTime:00 - $formattedEndTime:00";

                        // Check if the time slot is reserved and mark it as unavailable if reserved
                        $isReserved = in_array($i + 1, $reservedTimeSlots);

                        if ($isReserved) {
                            echo "<option value='$i' disabled>$formattedTimeSlot (Reserved)</option>";
                        } else {
                            echo "<option value='$i'>$formattedTimeSlot</option>";
                        }
                    }
                    ?>
                </select>

                <input type="hidden" name="doctor" value="<?php echo $doctor; ?>">
                <input type="hidden" name="date" value="<?php echo $date; ?>">
                <div id="userInput" style="display: none;">
                    <div class="row">
                        <div class="col">
                            <label for="userName">Your Name:</label>
                            <input type="text" id="userName" name="userName" class="form-control">
                        </div>
                        <div class="col">
                            <button id="reserveButton" type="submit" class="btn btn-primary mt-4" disabled>Reserve Time Slot</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3"></div>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>

    <script>
        const timeSelect = document.getElementById('time');
        const userNameInput = document.getElementById('userName');
        const reserveButton = document.getElementById('reserveButton');

        timeSelect.addEventListener('change', () => {
            if (timeSelect.value !== '') {
                userNameInput.removeAttribute('disabled');
                reserveButton.removeAttribute('disabled');
                document.getElementById('userInput').style.display = 'block'; // Show the username input
            } else {
                userNameInput.setAttribute('disabled', 'disabled');
                reserveButton.setAttribute('disabled', 'disabled');
                document.getElementById('userInput').style.display = 'none'; // Hide the username input
            }
        });

        function validateForm() {
            const timeField = document.getElementById('time');
            const userNameField = document.getElementById('userName');

            if (timeField.value === "" || userNameField.value === "") {
                alert('All fields are required. Please fill them out.');
                return false;
            }

            return true;
        }
    </script>


</body>
</html>