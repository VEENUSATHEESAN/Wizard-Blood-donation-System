<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get donor ID from query string
$donor_id = $_GET['id'];

// Fetch donor data
$result = $conn->query("SELECT * FROM donors WHERE id='$donor_id'");
$donor = $result->fetch_assoc();

if (isset($_POST['update_donor'])) {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];

    // Update donor in the database
    $conn->query("UPDATE donors SET name='$name', blood_group='$blood_group', contact='$contact' WHERE id='$donor_id'");
    
    // Redirect to manage_donors.php after updating
    header('Location: manage_donors.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>
    <link rel="stylesheet" href="edit_donor.css">
</head>
<body>
    <div class="container">
        <h2>Edit Donor</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $donor['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <input type="text" name="blood_group" value="<?php echo $donor['blood_group']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" name="contact" value="<?php echo $donor['contact']; ?>" required>
            </div>
            <button type="submit" name="update_donor" class="btn-submit">Update Donor</button>
        </form>
    </div>
</body>
</html>
