<?php
session_start();
require_once("settings.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connManage, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: manage.php");
            exit();
        } else {
            echo "❌ Incorrect username or password.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head> 
    <meta name="keywords" content="KELP, Web Technology Assignment Part 2, Group Assignment">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Lotus A">
  <title>Manager Login</title>
  <link rel="stylesheet" href="Styles/index.css">
  <link rel="stylesheet" href="Styles/maintheme.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">

</head>
<body>
    <main>
    <h2>Login</h2>
    <form method="post" action="manage.php">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    </main>
</body>

</html>