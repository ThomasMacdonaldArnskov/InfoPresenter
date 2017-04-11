<!DOCTYPE html>
<html>
<head>

<?php

if (isset($_POST['register_submit'])) {

    $validuser = createUser($_POST['username'], $_POST['password']);
    if ($validuser) {
        require_once("includes/login_script.php");
        echo "But do we get to here?";
        /*runLogin($_POST['username'], $_POST['password']);*/
        header("Location: import.php");
    } else {
        header("Location: index.php");
    }
}

function createUser($username, $password)
{

    // No shenanigans with the SQL query
    $user = trim($username);
    $user = strip_tags($user);
    $user = htmlspecialchars($user);
    $user = strtolower($user);

    $pass = trim($password);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $returnresult = false;

    // Create connection
    require_once('includes/connection.php');
    $db_host = getDbHost();
    $db_password = getDbPassword();
    $db_username = getDbUser();
    $db_dbname = getDbDatabase();
    $conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT usernames FROM users WHERE usernames = '$user'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //Check if there is no user names matching a username in the database, if there is return false
    if ($row["usernames"] == $user) {
        echo("Username already taken, please select another");
        $returnresult = false;
    } else {
        $passhash = password_hash($pass, PASSWORD_DEFAULT);
        $createuser = "INSERT into users(usernames, passwords) VALUES ('$user','$passhash')";
        $conn->query($createuser);
        $returnresult = true;
    }
    mysqli_close($conn);
    return $returnresult;
}
