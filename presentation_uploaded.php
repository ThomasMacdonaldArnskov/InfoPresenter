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

$row = 1;
$col = 1;
$table = $_POST['name'];
$description = $_POST['description'];
$fields = array(); //Not used right?
$tmpRow = $row; //Not used right?
$username = $_SESSION['username'];

require_once('includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);


if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
    createTable($table, $conn,$username,$description);
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            initDB($table, $conn, $num,$username);
        }
        insertFields($table, $conn, $row,$username);
        echo "<p> $num fields in line $row: <br /></p>\n";
        for ($c = 0; $c < $num; $c++) {
            echo $data[$c] . " <br />\n";
            insertValues($table, $conn, $row, $data[$c], $c,$username);
            //insertValues($table,$conn,$c,$row, $data[$c]);
            echo "Row is :'$row'<br />";
            echo "C is :'$c'<br />";
        }
        $row++;


    }
    fclose($handle);
    mysqli_close($conn);
    //echo($_POST['file']);
}

function createTable($tmp_name, $connection,$user, $insertDescription)
{
    $unaltered_presentation_name = $tmp_name;
    $tmp_name = str_replace(' ', '', $tmp_name);
    $table_name = $user .'_'. $tmp_name;
    $sql = "CREATE TABLE $table_name (
                ID int UNIQUE NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (ID)
                );";
    $connection->query($sql);

    $insertInto = "INSERT INTO `user_presentations_table` (`user`, `presentation_name`, `description`) VALUES ('$user', '$unaltered_presentation_name', '$insertDescription')";
    $connection->query($insertInto);
    echo $user;
}

function insertFields($tmp_name, $connection, $datapoints,$user)
{
    $tmp_name = str_replace(' ', '', $tmp_name);
    $table_name = $user .'_'. $tmp_name;
    $sql = "ALTER TABLE `$table_name` ADD `$datapoints` VARCHAR(50) NOT NULL;";
    $connection->query($sql);
}

function initDB($tmp_name, $connection, $headlines, $user)
{
    $tmp_name = str_replace(' ', '', $tmp_name);
    $table_name = $user .'_'. $tmp_name;
    for ($i = 0; $i < $headlines; $i++) {
        $sql_init = "INSERT INTO `$table_name` (`ID`) VALUES ('')";
        $connection->query($sql_init);
    }
}

function insertValues($tmp_name, $connection, $currentRow, $data, $field, $user)
{
    $tmp_name = str_replace(' ', '', $tmp_name);
    $table_name = $user .'_'. $tmp_name;
    $field = $field + 1;
    $sql = "UPDATE `$table_name` SET `$currentRow` = '$data' WHERE `$table_name`.`ID` = $field";
    //$sql= "INSERT INTO `$table_name` ('$currentRow') VALUES ('$data') WHERE 'ID' = '$field'";
    $connection->query($sql);
}

