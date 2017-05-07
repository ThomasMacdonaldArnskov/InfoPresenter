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


echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
$presname_db = str_replace(' ', '', $presname);
$presname_db = $username."_".$presname_db;
echo $presname_db;
$content = "SELECT * FROM `$presname_db`";
$result_db = $conn->query($content);
//$row = $result_db->fetch_assoc();
$field_cnt = $result_db->field_count;
$row_cnt = $result_db->num_rows;


echo " is the name and the table has ".$field_cnt." fields .";
$content_fields = $field_cnt-1;
echo "However I only need the fields with actual content which is: ".$content_fields. " fields. The last field is just the ID <br />";

$store_array = array();
while($row = $result_db->fetch_assoc()) {
    //$store_array[] = $row;
    print_r($row);
}

/*
echo "<br /> HERE IS ROW NUMBER 2 <br />";
echo $row["2"];
*/
/*
for ($set = array (); $row = $result_db->fetch_assoc(); $set[array_shift($row)] = $row);
print_r($set);
*/

?>

</body>
</html>