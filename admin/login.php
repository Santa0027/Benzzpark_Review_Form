<?php
header('Content-Type: application/json');

include 'config.php'; // Make sure this file includes your DB connection

// Get POST data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT password FROM admin_users WHERE username = ?");
if (!$stmt) {
    die(json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]));
}


$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    // User exists, fetch password
    $stmt->bind_result($dbPassword);
    $stmt->fetch();
    
    // Compare the plaintext password
    if ($password === $dbPassword) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
}

$stmt->close();
$conn->close();
?>
