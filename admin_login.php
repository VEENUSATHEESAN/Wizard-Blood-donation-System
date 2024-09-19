<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
        <?php
        session_start();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Database connection
            $conn = new mysqli("localhost", "root", "", "blood_donation");

            // Check for connection error
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Secure the input
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);

            // Hash the password for security (assuming password is hashed in the database)
            $query = "SELECT * FROM admin WHERE username='$username' AND password=SHA1('$password')";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $_SESSION['admin'] = $username;
                header('Location: admin_dashboard.php');
                exit();
            } else {
                echo "<p style='color:red;'>Invalid login details</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
