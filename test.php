<?php
$row = 1;
$col = 1;
$table = $_POST['name'];
$fields = array();
$tmpRow = $row;

require_once('includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);


if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
    createTable($table, $conn);
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        if($row == 1) {
        initDB($table,$conn,$num);
        }
        insertFields($table,$conn,$row);
        echo "<p> $num fields in line $row: <br /></p>\n";
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . " <br />\n";
            insertValues($table,$conn,$row,$data[$c],$c);
            //insertValues($table,$conn,$c,$row, $data[$c]);
            echo "Row is :'$row'<br /><br />";
            echo "C is :'$c'<br /><br />";
        }
        $row++;


    }
    fclose($handle);

    //echo($_POST['file']);
}

function createTable($table_name,$connection)
{

    $sql = "CREATE TABLE $table_name (
                ID int UNIQUE NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (ID)
                );";
    $connection->query($sql);
}

function insertFields($table_name, $connection,$datapoints){
    $sql= "ALTER TABLE `$table_name` ADD `$datapoints` VARCHAR(50) NOT NULL;";
    $connection->query($sql);
}

function initDB($table_name, $connection, $headlines){
    for($i = 0; $i < $headlines; $i++) {
        $sql_init = "INSERT INTO `$table_name` (`ID`) VALUES ('')";
        $connection->query($sql_init);
    }
}

function insertValues($table_name, $connection,$currentRow,$data,$field){
    $field = $field+1;
    $sql = "UPDATE `$table_name` SET `$currentRow` = '$data' WHERE `$table_name`.`ID` = $field";
    //$sql= "INSERT INTO `$table_name` ('$currentRow') VALUES ('$data') WHERE 'ID' = '$field'";
    $connection->query($sql);
}

