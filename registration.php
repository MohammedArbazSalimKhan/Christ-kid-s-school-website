<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your custom styles here -->
</head>
chmod 644 registration.php


<body>
    <div class="container">
        <h1 class="registration-heading">Student Registration Form</h1>
        <form action="process_registration.php" method="POST" class="registration-form">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="tel" id="contact_number" name="contact_number" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="class">Select Class:</label>
                <select id="class" name="class">
                    <option value="1">Class 1</option>
                    <option value="2">Class 2</option>
                    <option value="3">Class 3</option>
                    <option value="4">Class 4</option>
                    <option value="5">Class 5</option>
                    <option value="6">Class 6</option>
                    <option value="7">Class 7</option>
                    <option value="8">Class 8</option>
                    <option value="9">Class 9</option>
                    <option value="10">Class 10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mother_name">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" required>
            </div>

            <div class="form-group">
                <label for="father_name">Father's Name:</label>
                <input type="text" id="father_name" name="father_name" required>
            </div>

            <div class="form-group">
                <label for="previous_school">Previous School:</label>
                <input type="text" id="previous_school" name="previous_school" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit" class="submit-button">
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('db_config.php'); // Include your database configuration file here

        $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
        // Get other form fields similarly

        $sql = "INSERT INTO students (first_name, last_name, date_of_birth, gender, address, contact_number, email, class, mother_name, father_name, previous_school)
                VALUES ('$first_name', '$last_name', '$date_of_birth', '$gender', '$address', '$contact_number', '$email', '$class', '$mother_name', '$father_name', '$previous_school')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>
</html>
