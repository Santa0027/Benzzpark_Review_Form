<?php
include 'config.php';



// Helper function to generate star ratings with filled/unfilled star classes
function displayStars($rating) {
    $stars = "";
    for ($i = 0; $i < 3; $i++) {
        $stars .= $i < $rating ? "<span class='filled'>★</span>" : "<span class='unfilled'>☆</span>";
    }
    return $stars;
}

$sql = "SELECT * FROM guest_feedback";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Feedback</title>
    <style>
        /* Container styling */
        .main {
            width: 90%;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Main table styling */
        .table-review {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table-review th, .table-review td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table-review th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Logo styling */
        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Section titles */
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #555;
            margin-top: 20px;
        }

        /* Star rating styling */
        .star-rating p {
            display: inline-block;
            margin: 0;
        }

        .star-rating .filled {
            color: #FFD700; /* Gold color for filled stars */
        }

        .star-rating .unfilled {
            color: #ddd; /* Gray color for unfilled stars */
        }

        /* Submission date */
        .submission-date {
            font-size: 12px;
            color: #888;
            text-align: right;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<div class='main'>
            <img src='logo.png' alt='Logo' class='logo'>
            <table class='table-review'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Room No</th>
                        <th>Ambience</th>
                        <th>Check-in/Check-out</th>
                        <th>Reservation</th>
                        <th>Food</th>
                        <th>Quality</th>
                        <th>Service</th>
                        <th>Cleanliness</th>
                        <th>Decor</th>
                        <th>Air Condition</th>
                        <th>Supplies</th>
                        <th>Comfort</th>
                        <th>Fittings</th>
                        <th>Choice</th>
                        <th>Purpose</th>
                        <th>Feedback</th>
                        <th>Submission Date</th>
                    </tr>
                </thead>
                <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['room']}</td>
                <td>" . displayStars($row['ambience']) . "</td>
                <td>" . displayStars($row['checkinout']) . "</td>
                <td>" . displayStars($row['reservation']) . "</td>
                <td>" . displayStars($row['food']) . "</td>
                <td>" . displayStars($row['quality']) . "</td>
                <td>" . displayStars($row['service']) . "</td>
                <td>" . displayStars($row['cleanliness']) . "</td>
                <td>" . displayStars($row['decor']) . "</td>
                <td>" . displayStars($row['air_condition']) . "</td>
                <td>" . displayStars($row['supplies']) . "</td>
                <td>" . displayStars($row['comfort']) . "</td>
                <td>" . displayStars($row['fittings']) . "</td>
                <td>" . displayStars($row['choice']) . "</td>
                <td>" . $row['purpose']. "</td>
                <td>{$row['feedback']}</td>
                <td class='submission-date'>{$row['submission_date']}</td>
              </tr>";
    }
    

    echo "</tbody></table></div>";
} else {
    echo "<p>No feedback records found.</p>";
}

echo '<form method="post" action="export_to_excel.php">
    <button type="submit" name="export">Export to Excel</button>
</form>
';
$conn->close();
?>

</body>
</html>
