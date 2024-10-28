<?php
session_start();
include 'config.php'; // Database connection

// Initialize response array
$response = [
    'success' => false,
    'message' => ''
];

// Check if the request is an AJAX POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        $response['message'] = "Username and password are required!";
    } else {
        // Fetch the user from the database
        $stmt = $conn->prepare("SELECT password FROM admin_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['admin_logged_in'] = true;
                $response['success'] = true;
                $response['message'] = "Login successful!";
            } else {
                $response['message'] = "Invalid username or password!";
            }
        } else {
            $response['message'] = "Invalid username or password!";
        }

        $stmt->close();
    }
}

$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
