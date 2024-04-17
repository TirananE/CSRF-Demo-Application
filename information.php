<?php
session_start();


// Handle logout

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Destroy the session
    session_unset();
    session_destroy();
    // Redirect to the login page
    header('Location: input.php');
    exit();
}

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: input.php');
    exit();
}

// Setup SQLite database connection
$db = new SQLite3('database.db');
$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

// Fetch the current username from the database
$result = $db->querySingle("SELECT username FROM UsersInfo WHERE id = $user_id", true);
if ($result) {
    $username = $result['username'];
} else {
    // Handle error or log out the user
    echo "User not found. Possible session tampering!";
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Information Page</title>
</head>

<body>
    <p>Logged in successfully.</p>
    <p>Username: <?php echo htmlspecialchars($username); ?></p>
    <a href="?action=logout">Logout</a>
    <p></p>
    <a href="attack.html">Click for a surprise!</a>
</body>

</html>