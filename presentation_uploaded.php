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
        header("Location: index.php");
    }

    $row = 1;
    $col = 1;
    $table = $_POST['name'];
    //$_SESSION['table'] = $_POST['name'];
    $description = $_POST['description'];
    $username = $_SESSION['username'];

    require_once('includes/connection.php');
    $db_host = getDbHost();
    $db_password = getDbPassword();
    $db_username = getDbUser();
    $db_dbname = getDbDatabase();

    $conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);


    if ($_POST['name'] != NULL) {
        if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
            $id = createTable($table, $conn, $username, $description);
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($data);
                if ($row == 1) {
                    initDB($table, $conn, $num, $username, $id);
                }
                insertFields($table, $conn, $row, $username, $id);
                for ($c = 0; $c < $num; $c++) {
                    insertValues($table, $conn, $row, $data[$c], $c, $username, $id);
                }
                $row++;
            }
            insertExtraFields($table, $username, $conn, $id);
        }
        fclose($handle);
        mysqli_close($conn);
    }

    function createTable($tmp_name, $connection, $user, $insertDescription)
    {
        $returnableID = "";
        $unaltered_presentation_name = $tmp_name;

        $insertInto = "INSERT INTO `user_presentations_table` (`user`, `presentation_name`, `description`) VALUES ('$user', '$unaltered_presentation_name', '$insertDescription')";
        $connection->query($insertInto);

        $selectID = "SELECT ID FROM `user_presentations_table` WHERE user = '$user' AND presentation_name = '$unaltered_presentation_name'";
        $result = $connection->query($selectID);
        while ($row = $result->fetch_assoc()) {
            $returnableID = $row["ID"];
        }

        //$tmp_name = str_replace(' ', '', $tmp_name);
        $table_name = $user . '_' . $returnableID;
        $sql = "CREATE TABLE $table_name (
                ID int UNIQUE NOT NULL AUTO_INCREMENT,
                icon int,
                PRIMARY KEY (ID)
                );";
        $connection->query($sql);


        return $returnableID;
    }

    function insertFields($tmp_name, $connection, $datapoints, $user, $id)
    {
        //$tmp_name = str_replace(' ', '', $tmp_name);
        $table_name = $user . '_' . $id;
        $sql = "ALTER TABLE `$table_name` ADD `$datapoints` VARCHAR(50) NOT NULL;";
        $connection->query($sql);
    }

    function initDB($tmp_name, $connection, $headlines, $user, $id)
    {
        $table_name = $user . '_' . $id;
        for ($i = 0; $i < $headlines; $i++) {
            $sql_init = "INSERT INTO `$table_name` (`ID`) VALUES ('')";
            $connection->query($sql_init);
            $charttypeInit = "INSERT INTO `$table_name` (`charttype`) VALUES ('0')";
            $connection->query($charttypeInit);
        }
    }

    function insertValues($tmp_name, $connection, $currentRow, $data, $field, $user, $id)
    {
        $table_name = $user . '_' . $id;
        $field = $field + 1;
        $sql = "UPDATE `$table_name` SET `$currentRow` = '$data', `icon` = '0' WHERE `$table_name`.`ID` = $field";
        $connection->query($sql);
    }

    function insertExtraFields($tmp_name, $user, $connection, $id)
    {
        $table_name = $user . '_' . $id;
        $alterTableLastly = "ALTER TABLE `$table_name` ADD `charttype` INT NOT NULL AFTER `icon`, ADD `description` TEXT NOT NULL AFTER `charttype`, ADD `subheader` VARCHAR(255) NOT NULL AFTER `description`";
        $connection->query($alterTableLastly);
    }

    ?>

</head>
<body>

<br/><br/><br/>

<h1 class="text-center">Spreadsheet succesfully uploaded</h1>
<p class="text-center">Now it is time to review and customize your data</p>
<br />
<div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
        <form action="edit_presentation.php" method="post">
            <input type="hidden" name="pres_name" value="<?php echo $table; ?>">
            <input type="submit" class="btn-block btn btn-success uploadpresentation" name="submit" value="Continue to customization">
        </form>
    </div>
    <div class="col-sm-5"></div>
</div>

<br/><br/><br/>


</body>
</html>
