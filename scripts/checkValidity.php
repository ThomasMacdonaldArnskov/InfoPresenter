<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>
<body>

<?php
$q = $_GET['q'];

require_once('../includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);

$sql = "SELECT * FROM users WHERE usernames = '$q'";
$result = $conn->query($sql);
$row_cnt = $result->num_rows;


if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $q)) {
    echo '<p class="text-right">Your selected username contains invalid characters<br /> Please select another</p>';
}

if ($row_cnt != 0) {
    echo '<p class="text-right">A user with that username already exists.<br /> Please select another</p>';
} else {
    echo '&nbsp;<br />&nbsp;';
}



?>
</body>
</html>