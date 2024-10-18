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
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    padding: 20px;
                }
                .container {
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 0;
                    text-align: center;
                    border-radius: 5px 5px 0 0;
                }
                .star {
                    color: gold;
                }
                .feedback-section {
                    margin: 20px 0;
                }
                .footer {
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>New Feedback Submission <span class="star">⭐</span></h2>
                </div>
                <div class="feedback-section">
                    <h3>Details</h3>
                    <p><strong>Name:</strong> ' . htmlspecialchars($Name) . '</p>
                    <p><strong>Phone:</strong> ' . htmlspecialchars($phone) . '</p>
                    <p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
                    <p><strong>Room:</strong> ' . htmlspecialchars($room) . '</p>
                    <p><strong>Ambience:</strong> ' . htmlspecialchars($ambience) . '</p>
                    <p><strong>Check-in/Check-out:</strong> ' . htmlspecialchars($checkinout) . '</p>
                    <p><strong>Reservation:</strong> ' . htmlspecialchars($reservation) . '</p>
                    <p><strong>Food:</strong> ' . htmlspecialchars($food) . '</p>
                    <p><strong>Quality:</strong> ' . htmlspecialchars($Quality) . '</p>
                    <p><strong>Service:</strong> ' . htmlspecialchars($Service) . '</p>
                    <p><strong>Cleanliness:</strong> ' . htmlspecialchars($Cleanliness) . '</p>
                    <p><strong>Decor:</strong> ' . htmlspecialchars($Decor) . '</p>
                    <p><strong>Air Conditioning:</strong> ' . htmlspecialchars($Air_Condition) . '</p>
                    <p><strong>Supplies:</strong> ' . htmlspecialchars($Supplies) . '</p>
                    <p><strong>Comfort:</strong> ' . htmlspecialchars($Comfort) . '</p>
                    <p><strong>Fittings:</strong> ' . htmlspecialchars($Fittings) . '</p>
                    <p><strong>Choice:</strong> ' . htmlspecialchars($choice) . '</p>
                    <p><strong>Purpose:</strong> ' . htmlspecialchars($purpose) . '</p>
                    <p><strong>Feedback:</strong> ' . htmlspecialchars($feedback) . '</p>
                </div>
                <div class="footer">
                    <p>Thank you for your feedback!</p>
                </div>
            </div>
        </body>
    </html>';

    $mail->AltBody = 'This is the plain text version of the email content'; // For non-HTML clients


        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        $mail->SMTPDebug = 2; // Set to 2 for detailed debug output


        // Send the email
        $mail->send();
        echo 'Feedback has been sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>




