<?php

    if (isset($_POST['login_submit'])){
        $validLogin = login($_POST['username'], $_POST['password']);

        if ($validLogin){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $_POST['username'];
        } else {
            //Needs to go at some point!
            echo ("<br /><br /><br /><br /><br />Login failed");
        }

    }

    function login($username, $password) {

        $pass = trim($password);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        $name = trim($username);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $name = strtolower ($name);


        // Create connection
        require_once('connection.php');
        $db_host = getDbHost();
        $db_password = getDbPassword();
        $db_username = getDbUser();
        $db_dbname = getDbDatabase();
        $conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT usernames, passwords FROM users WHERE usernames = '$name'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $passDB = $row["passwords"];

                if($row["usernames"] == $username && password_verify($pass, $passDB)) {
                    $returnStatement = true;
                } else {
                    $returnStatement = false;
                }

        mysqli_close($conn);
        return $returnStatement;
    }

    function runLogin($username,$password) {
        echo "<br /><br /><br /><br /><br />IS THIS EVEN ReACHED?";
        $validLogin = login($username, $password);

        if ($validLogin){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
        } else {
            //Needs to go at some point!
            echo ("<br /><br /><br /><br /><br />Login failed");
        }
    }