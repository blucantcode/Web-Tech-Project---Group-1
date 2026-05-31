<?php
session_start();
require_once("settings.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $connManage->prepare( "SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
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

<head>
    <meta name="keywords" content="KELP, Web Technology Assignment Part 2, Group Assignment">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lotus A">
    <title>Manager Login</title>
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

<body class="managelogin">
    <main>
        <!-- Header -->
        <h2>Login</h2>
        <div class="login">
            <!-- Username & Passowrd Entry -->
        <form method="post" action="manage.php">
           <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
            <div class="loginbutton">
            <button type="submit">Login</button>
            </div>
            <!-- Return Button -->
            <div class="return">
        <a href="index.php">Return To Home</a>
    </div>
        </form>
        </div>
    </main>
</body>

</html>