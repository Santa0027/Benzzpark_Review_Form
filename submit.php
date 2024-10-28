<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benzzark";  // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} // Database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST["gname"];
    $phone = $_POST["gphone"];
    $email = $_POST["gemail"];
    $room = $_POST["groom"];
    $ambience = $_POST["ambience"];
    $checkinout = $_POST["checkinout"];
    $reservation = $_POST["reservation"];
    $food = $_POST["food"];
    $quality = $_POST["Quality"];
    $service = $_POST["Service"];
    $cleanliness = $_POST["Cleanliness"];
    $decor = $_POST["Decor"];
    $air_condition = $_POST["Air_Condition"];
    $supplies = $_POST["Supplies"];
    $comfort = $_POST["Comfort"];
    $fittings = $_POST["Fittings"];
    $choice = $_POST["choice"];
    $purpose = $_POST["purpose"];
    $feedback = $_POST["feedback"];

    // SQL query to insert data into the guest_feedback table
    $sql = "INSERT INTO guest_feedback 
            (name, phone, email, room, ambience, checkinout, reservation, food, quality, service, cleanliness, decor, air_condition, supplies, comfort, fittings, choice, purpose, feedback, submission_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisiiiiiiiiiiiiiss", $name, $phone, $email, $room, $ambience, $checkinout, $reservation, $food, $quality, $service, $cleanliness, $decor, $air_condition, $supplies, $comfort, $fittings, $choice, $purpose, $feedback);

    // Execute and check if successful
    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
