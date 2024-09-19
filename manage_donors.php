<?php
// Check for admin login
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

// Fetch donors from the database
$donors = $conn->query("SELECT * FROM donors");

if (isset($_POST['delete'])) {
    $donor_id = $_POST['donor_id'];
    $conn->query("DELETE FROM donors WHERE id='$donor_id'");
    header('Location: manage_donors.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donors</title>
    <link rel="stylesheet" href="manage_donors.css">
</head>
<body>
    <div class="container">
        <h2>Manage Donors</h2>
        <a href="add_donor.php" class="add-button">Add Donor</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $donors->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['blood_group']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td>
                        <a href="edit_donor.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                        <form method="POST" class="delete-form">
                            <input type="hidden" name="donor_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
