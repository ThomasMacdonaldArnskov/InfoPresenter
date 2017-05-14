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
$i = $_GET['i'];
$t = $_GET['table'];
$u = $_GET['user'];
$m = intval($_GET['mode']);
$c = intval($_GET['cycle']);

//$presentationNameDB = str_replace(' ', '', $i);
$presentationNameDB = $u . "_" . $i;



require_once('../includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);

if ($m == 1) {
    $checkValidity = "SELECT * FROM `user_presentations_table` WHERE user = '$u' AND presentation_name = '$q'";
    $validity = $conn->query($checkValidity);
    $row_cnt = $validity->num_rows;
    $validity->close();
    if($row_cnt == 0) {
    $update = "UPDATE `user_presentations_table` SET `presentation_name` = '$q' WHERE `user_presentations_table`.`ID` = '$i'";
    $conn->query($update);
    } else {
        echo 'A presentation by that name already exists. Please select another name';
    }
} else if ($m == 2) {
    $update = "UPDATE `user_presentations_table` SET `description` = '$q' WHERE `user_presentations_table`.`ID` = '$i'";
    $conn->query($update);
} else if ($m == 3) {
    $update = "UPDATE `$presentationNameDB` SET `1` = '$q' WHERE `$presentationNameDB`.`ID` = '$c'";
    $conn->query($update);
} else if ($m == 4) {
    $update = "UPDATE `$presentationNameDB` SET `subheader` = '$q' WHERE `$presentationNameDB`.`ID` = '$c'";
    $conn->query($update);
} else if ($m == 5) {
    $update = "UPDATE `$presentationNameDB` SET `description` = '$q' WHERE `$presentationNameDB`.`ID` = '$c'";
    $conn->query($update);
} else if ($m == 6 && $q!= -1) {
    $update = "UPDATE `$presentationNameDB` SET `charttype` = '$q' WHERE `$presentationNameDB`.`ID` = '$c'";
    $conn->query($update);
} else if ($m == 7 && $q!= -1) {
    $update = "UPDATE `$presentationNameDB` SET `icon` = '$q' WHERE `$presentationNameDB`.`ID` = '$c'";
    $conn->query($update);
}

$conn->close();

?>
</body>
</html>