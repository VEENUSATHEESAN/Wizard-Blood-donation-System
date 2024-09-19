<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Fetch blood stocks from the database
$blood_stocks = $conn->query("SELECT * FROM blood_stocks");

if (isset($_POST['delete'])) {
    $stock_id = $_POST['stock_id'];
    $conn->query("DELETE FROM blood_stocks WHERE id='$stock_id'");
    header('Location: manage_blood_stocks.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Blood Stocks</title>
    <link rel="stylesheet" href="manage_blood_stocks.css">
</head>
<body>
    <h2>Manage Blood Stocks</h2>
    <a href="add_blood_stock.php">Add Blood Stock</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Blood Group</th>
            <th>Available Units</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $blood_stocks->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['blood_group']; ?></td>
            <td><?php echo $row['available_units']; ?></td>
            <td>
                <a href="edit_blood_stock.php?id=<?php echo $row['id']; ?>">Edit</a>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="stock_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
