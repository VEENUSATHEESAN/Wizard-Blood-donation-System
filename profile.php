<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['donor_id'])) {
    header("Location: login.html");  // Redirect to login page if not logged in
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the donor's data
$donor_id = $_SESSION['donor_id'];
$stmt = $conn->prepare("SELECT name, age, blood_group, contact, health_status FROM donors WHERE id = ?");
$stmt->bind_param("i", $donor_id);
$stmt->execute();
$stmt->bind_result($name, $age, $blood_group, $contact, $health_status);
$stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Profile - Wizard Blood Donation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="profile-container">
        <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
        <p>Age: <?php echo htmlspecialchars($age); ?></p>
        <p>Blood Group: <?php echo htmlspecialchars($blood_group); ?></p>
        <p>Contact: <?php echo htmlspecialchars($contact); ?></p>
        <p>Health Status: <?php echo htmlspecialchars($health_status); ?></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
