<!DOCTYPE html>
<html>
<head>

    <?php
    include('includes/login_script.php');
    include('includes/header.php');
    include('includes/menu.php');

    if (isset($_POST['register_submit'])){

        createUser($_POST['username'], $_POST['password']);
    }

    function createUser($username, $password) {

        $returnStatement = false;

        // No shenanigans with the SQL query
        $user = trim($username);
        $user = strip_tags($user);
        $user = htmlspecialchars($user);

        $pass = trim($password);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

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
                if($row["usernames"] == $user) {
                    echo("Username already taken, please select another");
                } else {
                    $user = strtolower ($user);
                    $passhash = password_hash($pass, PASSWORD_DEFAULT);
                    $createuser = "INSERT into users(usernames, passwords) VALUES ('$user','$passhash')";
                    $conn ->query($createuser);
                }

        mysqli_close($conn);
    }
    ?>



</head>
<body>

<br/><br/><br/>
<h1>Header test</h1>
<h3>Subheader test</h3>
<p>Paragraph test</p>
<pre>Preformatted test</pre>
<blockquote>Blockquote test</blockquote>

</body>
</html>