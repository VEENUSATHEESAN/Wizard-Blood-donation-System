<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Get the ID of the blood bank to edit
$id = $_GET['id'];

// Fetch current blood bank details
$result = $conn->query("SELECT * FROM blood_banks WHERE id='$id'");
$bank = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $location = htmlspecialchars($_POST['location']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $available_blood_groups = htmlspecialchars($_POST['available_blood_groups']);

    if (!empty($name) && !empty($location) && !empty($contact_number) && !empty($available_blood_groups)) {
        $stmt = $conn->prepare("UPDATE blood_banks SET name=?, location=?, contact_number=?, available_blood_groups=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $location, $contact_number, $available_blood_groups, $id);

        if ($stmt->execute()) {
            echo "Blood Bank updated successfully!";
            header('Location: manage_blood_banks.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blood Bank</title>
    <link rel="stylesheet" href="edit_blood_bank.css">
</head>
<body>
    <h2>Edit Blood Bank</h2>
    <form method="POST" action="">
        <div>
            <label for="name">Blood Bank Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $bank['name']; ?>" required>
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $bank['location']; ?>" required>
        </div>
        <div>
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo $bank['contact_number']; ?>" required>
        </div>
        <div>
            <label for="available_blood_groups">Available Blood Groups:</label>
            <input type="text" id="available_blood_groups" name="available_blood_groups" value="<?php echo $bank['available_blood_groups']; ?>" required>
        </div>
        <button type="submit">Update Blood Bank</button>
    </form>
</body>
</html>
