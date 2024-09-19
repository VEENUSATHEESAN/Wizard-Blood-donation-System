<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Fetch donations from the database
$donations = $conn->query("SELECT * FROM donations");

// Handle delete request
if (isset($_POST['delete'])) {
    $donation_id = $_POST['donation_id'];
    $conn->query("DELETE FROM donations WHERE id='$donation_id'");
    header('Location: manage_donations.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donations</title>
    <link rel="stylesheet" href="manage_donations.css">
</head>
<body>
    <div class="container">
        <h2>Manage Donations</h2>
        <a href="add_donation.php" class="btn-add">Add Donation</a>
        <table class="donations-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donor Name</th>
                    <th>Blood Group</th>
                    <th>Donation Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $donations->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['donor_name']; ?></td>
                    <td><?php echo $row['blood_group']; ?></td>
                    <td><?php echo $row['donation_date']; ?></td>
                    <td>
                        <a href="edit_donation.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="donation_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
