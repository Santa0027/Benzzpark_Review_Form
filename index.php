<?php




// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Validate that the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';              // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                             // Enable SMTP authentication
        $mail->Username   = 'benzzparkvlr@gmail.com';         // SMTP username
        $mail->Password   = 'sdnl zdee rsde ktbr';            // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
        $mail->Port       = 587;                              // TCP port to connect to

        // Recipients
        $mail->setFrom('benzzparkvlr@gmail.com', 'benzzpark');
        $mail->addAddress('vjsanthakumar@gmail.com', 'it vellore'); // Add a recipient

        // Email subject
        $mail->Subject = 'New Feedback Submission';

        // Prepare email body
        $Name = $_POST["gname"];
        $phone = $_POST["gphone"];
        $email = $_POST["gemail"];
        $room = $_POST["groom"];
        $ambience = $_POST["ambience"];
        $checkinout = $_POST["checkinout"];
        $reservation = $_POST["reservation"];
        $food = $_POST["food"];
        $Quality = $_POST["Quality"];
        $Service = $_POST["Service"];
        $Cleanliness = $_POST["Cleanliness"];
        $Decor = $_POST["Decor"];
        $Air_Condition = $_POST["Air_Condition"];
        $Supplies = $_POST["Supplies"];
        $Comfort = $_POST["Comfort"];
        $Fittings = $_POST["Fittings"];
        $choice = $_POST["choice"];
        $purpose = $_POST["purpose"];
        $feedback = $_POST["feedback"];

        $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'New Feedback Submission';

    // Construct your HTML email body
    $mail->Body = '
    <html>
        <head>
            <style>
                /* General Body Styles */
                body {
                    font-family: "Helvetica Neue", Arial, sans-serif;
                    background-color: #f9f9f9;
                    margin: 0;
                    padding: 0;
                    color: #333;
                    -webkit-text-size-adjust: none; /* Prevent font size adjustment on mobile devices */
                }
    
                /* Email Wrapper */
                .email-wrapper {
                    width: 100%;
                    background-color: #f4f6f8;
                    padding: 20px;
                    box-sizing: border-box;
                }
    
                /* Main Container */
                .container {
                    max-width: 700px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    border-radius: 10px;
                    padding: 40px;
                    box-sizing: border-box;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                }
    
                /* Header Section */
                .header {
                    background-color: #007bff;
                    color: #ffffff;
                    padding: 30px;
                    text-align: center;
                    border-radius: 10px 10px 0 0;
                    margin-bottom: 30px;
                }
    
                .header h2 {
                    margin: 0;
                    font-size: 28px;
                    font-weight: 600;
                }
    
                /* Table Styling */
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 30px;
                }
    
                th, td {
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;
                }
    
                th {
                    background-color: #f2f2f2;
                    color: #333;
                    font-weight: bold;
                }
    
                td {
                    background-color: #fafafa;
                }
    
                tr:nth-child(even) td {
                    background-color: #f9f9f9;
                }
    
                /* Section Titles */
                .section-title {
                    font-size: 22px;
                    font-weight: bold;
                    color: #007bff;
                    margin-bottom: 20px;
                }
    
                /* Footer Section */
                .footer {
                    text-align: center;
                    font-size: 14px;
                    color: #777;
                    margin-top: 30px;
                    padding-top: 20px;
                    border-top: 2px solid #f1f1f1;
                }
    
                .footer p {
                    margin: 0;
                    padding: 5px 0;
                }
    
                /* Button Styles */
                .btn {
                    display: inline-block;
                    padding: 12px 25px;
                    font-size: 16px;
                    font-weight: 600;
                    color: #ffffff;
                    background-color: #007bff;
                    text-decoration: none;
                    border-radius: 5px;
                    text-align: center;
                    margin-top: 20px;
                }
    
                /* Mobile Responsiveness */
                @media screen and (max-width: 768px) {
                    .container {
                        padding: 20px;
                    }
    
                    .header h2 {
                        font-size: 24px;
                    }
    
                    .section-title {
                        font-size: 20px;
                    }
    
                    .footer {
                        font-size: 12px;
                        padding-top: 15px;
                    }
    
                    th, td {
                        padding: 10px;
                    }
                }
    
                @media screen and (max-width: 480px) {
                    .container {
                        padding: 15px;
                    }
    
                    .header h2 {
                        font-size: 20px;
                    }
    
                    .section-title {
                        font-size: 18px;
                    }
    
                    .footer {
                        font-size: 11px;
                        padding-top: 10px;
                    }
    
                    th, td {
                        padding: 8px;
                    }
                }
            </style>
        </head>
        <body>
            <div class="email-wrapper">
                <div class="container">
                    <div class="header">
                        <h2>New Feedback Submission</h2>
                    </div>
    
                    <div class="section">
                        <div class="section-title">Feedback Details</div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <td>' . htmlspecialchars($Name) . '</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>' . htmlspecialchars($phone) . '</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>' . htmlspecialchars($email) . '</td>
                            </tr>
                            <tr>
                                <th>Room</th>
                                <td>' . htmlspecialchars($room) . '</td>
                            </tr>
                            <tr>
                                <th>Ambience</th>
                                <td>' . htmlspecialchars($ambience) . '</td>
                            </tr>
                            <tr>
                                <th>Check-in/Check-out</th>
                                <td>' . htmlspecialchars($checkinout) . '</td>
                            </tr>
                            <tr>
                                <th>Reservation</th>
                                <td>' . htmlspecialchars($reservation) . '</td>
                            </tr>
                            <tr>
                                <th>Food</th>
                                <td>' . htmlspecialchars($food) . '</td>
                            </tr>
                            <tr>
                                <th>Quality</th>
                                <td>' . htmlspecialchars($Quality) . '</td>
                            </tr>
                            <tr>
                                <th>Service</th>
                                <td>' . htmlspecialchars($Service) . '</td>
                            </tr>
                            <tr>
                                <th>Cleanliness</th>
                                <td>' . htmlspecialchars($Cleanliness) . '</td>
                            </tr>
                            <tr>
                                <th>Decor</th>
                                <td>' . htmlspecialchars($Decor) . '</td>
                            </tr>
                            <tr>
                                <th>Air Conditioning</th>
                                <td>' . htmlspecialchars($Air_Condition) . '</td>
                            </tr>
                            <tr>
                                <th>Supplies</th>
                                <td>' . htmlspecialchars($Supplies) . '</td>
                            </tr>
                            <tr>
                                <th>Comfort</th>
                                <td>' . htmlspecialchars($Comfort) . '</td>
                            </tr>
                            <tr>
                                <th>Fittings</th>
                                <td>' . htmlspecialchars($Fittings) . '</td>
                            </tr>
                            <tr>
                                <th>Choice</th>
                                <td>' . htmlspecialchars($choice) . '</td>
                            </tr>
                            <tr>
                                <th>Purpose</th>
                                <td>' . htmlspecialchars($purpose) . '</td>
                            </tr>
                            <tr>
                                <th>Feedback</th>
                                <td>' . htmlspecialchars($feedback) . '</td>
                            </tr>
                        </table>
                    </div>
    
                    <div class="footer">
                        <p>Thank you for your feedback!</p>
                        <a href="https://example.com" class="btn">View Full Details</a>
                    </div>
                </div>
            </div>
        </body>
    </html>';
    

    $mail->AltBody = 'This is the plain text version of the email content'; // For non-HTML clients


      

        // Send the email
        $mail->send();
 
    } catch (Exception $e) {
      
    }


    

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
    $stmt->bind_param("sisiiiiiiiiiiiiisss", $name, $phone, $email, $room, $ambience, $checkinout, $reservation, $food, $quality, $service, $cleanliness, $decor, $air_condition, $supplies, $comfort, $fittings, $choice, $purpose, $feedback);

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
}
?>




