<?php
session_start();
require_once("settings.php");

$conn = mysqli_connect($host, $username, $password, $database);

// Get user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);



    // Simple query to check credentials
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    //check hashed pass
    if ($user && password_verify($input_password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo "❌ Incorrect username or password.";
    }
}
?>


<!DOCTYPE html>
<html>

<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>