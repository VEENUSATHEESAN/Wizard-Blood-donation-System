<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Fetch the existing stock data
if (isset($_GET['id'])) {
    $stock_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM blood_stocks WHERE id = '$stock_id'");
    $stock = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stock_id = $_POST['stock_id'];
    $blood_group = $_POST['blood_group'];
    $available_units = $_POST['available_units'];

    // Update the stock data in the database
    $stmt = $conn->prepare("UPDATE blood_stocks SET blood_group = ?, available_units = ? WHERE id = ?");
    $stmt->bind_param("sii", $blood_group, $available_units, $stock_id);
    $stmt->execute();
    $stmt->close();

    header('Location: manage_blood_stocks.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Blood Stock</title>
    <link rel="stylesheet" href="add_blood_stock.css">
</head>
<body>
    <h2>Edit Blood Stock</h2>
    <form method="POST">
        <input type="hidden" name="stock_id" value="<?php echo $stock['id']; ?>">
        <label for="blood_group">Blood Group:</label>
        <input type="text" name="blood_group" id="blood_group" value="<?php echo $stock['blood_group']; ?>" required>
        <br>
        <label for="available_units">Available Units:</label>
        <input type="number" name="available_units" id="available_units" value="<?php echo $stock['available_units']; ?>" required>
        <br>
        <button type="submit">Update Blood Stock</button>
    </form>
    <a href="manage_blood_stocks.php">Back to Manage Blood Stocks</a>
</body>
</html>
