<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    exit('Access Denied');
}

// Setup SQLite database connection
$db = new SQLite3('database.db');

// Check that the request includes the trigger for changing the username
if (isset($_POST['change_username'])) {
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

    // Retrieve the current username from the database
    $result = $db->querySingle("SELECT username FROM UsersInfo WHERE id = $user_id", true);
    if ($result) {
        $current_username = $result['username'];
        $new_username = 'hackedUsername_' . $current_username;

        // Update the username in the database
        $sql = "UPDATE UsersInfo SET username = '" . SQLite3::escapeString($new_username) . "' WHERE id = $user_id";
        if ($db->exec($sql)) {
            echo "Username changed successfully to {$new_username}.";
        } else {
            echo "Error updating username.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
