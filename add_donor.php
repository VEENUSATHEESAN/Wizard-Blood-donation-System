<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_POST['add_donor'])) {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "blood_donation");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert donor into the correct table (donors, not donors1)
    $conn->query("INSERT INTO donors (name, blood_group, contact) VALUES ('$name', '$blood_group', '$contact')");
    
    // Redirect to manage_donors.php after successful insertion
    header('Location: manage_donors.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donor</title>
    <link rel="stylesheet" href="add_donor.css">
</head>
<body>
    <div class="container">
        <h2>Add New Donor</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <input type="text" name="blood_group" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" name="contact" required>
            </div>
            <button type="submit" name="add_donor" class="btn-submit">Add Donor</button>
        </form>
    </div>
</body>
</html>
