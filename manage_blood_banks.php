<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Fetch blood banks from the database
$blood_banks = $conn->query("SELECT * FROM blood_banks");

// Handle deletion of a blood bank
if (isset($_POST['delete'])) {
    $bank_id = $_POST['bank_id'];
    $conn->query("DELETE FROM blood_banks WHERE id='$bank_id'");
    header('Location: manage_blood_banks.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blood Banks</title>
    <link rel="stylesheet" href="manage_blood_banks.css">
</head>
<body>
    <h2>Manage Blood Banks</h2>
    <a href="add_blood_bank.php">Add Blood Bank</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Contact Number</th>
            <th>Available Blood Groups</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $blood_banks->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['contact_number']; ?></td>
            <td><?php echo $row['available_blood_groups']; ?></td>
            <td>
                <a href="edit_blood_bank.php?id=<?php echo $row['id']; ?>">Edit</a>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="bank_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
