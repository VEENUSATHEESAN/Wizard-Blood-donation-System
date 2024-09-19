<?php
session_start();

// Check if the donor is logged in
if (!isset($_SESSION['donor_id'])) {
    header("Location: login.html");
    exit();
}

// Fetch the donor data from the database (for example, donor details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$donor_id = $_SESSION['donor_id'];

// Fetch donor's name
$stmt = $conn->prepare("SELECT name FROM donors1 WHERE id = ?");
$stmt->bind_param("i", $donor_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donor Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="dashboard-container">
    <header class="dashboard-header">
      <h1>Donor Dashboard</h1>
      <p>Welcome, <?php echo htmlspecialchars($name); ?>!</p>
      <a href="logout.php" class="logout-btn">Logout</a>
    </header>

    <main class="dashboard-main">
      <section class="management-section">
        <h2>Manage the following:</h2>
        <ul class="management-list">
          <li><a href="donors.php">Donors</a></li>
          <li><a href="donations.php"> Donations</a></li>
          <li><a href="blood_stocks.php"> Blood Stocks</a></li>
          <li><a href="user_events.php"> Events</a></li>
          <li><a href="user_blood_banks.php"> Blood Banks</a></li>
          <li><a href="volunteers.php"> volunteers</a></li>
        </ul>
      </section>
    </main>

    <footer class="dashboard-footer">
      <p>&copy; 2024 Wizard Blood Donation. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
