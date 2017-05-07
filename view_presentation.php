<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

    <!-- Include the headers and scripts-->
    <?php
    include('includes/header.php');
    include('includes/login_script.php');

    //If a user is logged in he see's the corresponding navigational menu, otherwise the regular
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        include('includes/menuMember.php');
    } else {
        include('includes/menu.php');
    }

    $presname = $_POST['pres_name'];
    $username = $_SESSION['username'];

    ?>

</head>
<body>

<br/><br/><br/><br/>

<?php

echo $username;
echo "<br />";
echo $presname;
echo "<br />";

require_once('includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);

$sql = "SELECT * FROM user_presentations_table WHERE `user` = '$username' AND `presentation_name` = '$presname'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo $row["presentation_name"];
}


?>

</body>
</html>