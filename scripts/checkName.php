<?php session_start(); ?>

<!DOCTYPE html>
<html>

<body>

<?php
$q = $_GET['q'];
$username = $_SESSION['username'];

require_once('../includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);

$checkValidity = "SELECT * FROM `user_presentations_table` WHERE user = '$username' AND presentation_name = '$q'";
$result = $conn->query($checkValidity);
$row_cnt = $result->num_rows;

if ($row_cnt != 0) {
    echo '<p class="text-right">A presentation by the name <br />';
    echo $q;
    echo ' already exists. <br />Please choose another name for your presentation</p>';
} else {
    echo '&nbsp;<br />&nbsp;';
}



?>
</body>
</html>