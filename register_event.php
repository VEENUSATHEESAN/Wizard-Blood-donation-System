<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $event_id = isset($_POST['event_id']) ? (int)$_POST['event_id'] : null;
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : null;
    $contact = isset($_POST['contact']) ? htmlspecialchars(trim($_POST['contact'])) : null;
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
    $volunteer = isset($_POST['volunteer']) ? 1 : 0;

    // Validate inputs
    if (empty($name) || empty($contact) || empty($email)) {
        echo "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } elseif (!preg_match("/^[0-9]{10}$/", $contact)) {
        echo "Invalid contact number. It must be a 10-digit number!";
    } elseif (is_null($event_id)) {
        echo "Invalid event selected.";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO event_registrations (event_id, name, contact, email, volunteer) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $event_id, $name, $contact, $email, $volunteer);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
