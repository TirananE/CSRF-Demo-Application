<?php
session_start();

// Open SQLite database
$db = new SQLite3('database.db');

// Handle login attempt
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = SQLite3::escapeString($_POST['username']);
    $password = SQLite3::escapeString($_POST['password']);

    $result = $db->querySingle("SELECT * FROM UsersInfo WHERE username = '$username' AND passwd = '$password'", true);

    if (!empty($result)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $result['id'];  // Store user ID in the session
        header('Location: information.php');
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <form method="post" action="input.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error_message)) echo $error_message; ?>
</body>

</html>