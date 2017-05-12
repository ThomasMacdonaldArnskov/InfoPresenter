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
    //$table = $_POST['name'];
    //$_SESSION['table'] = $_POST['name'];
    //$table = $_SESSION[$table];
    $table = "start";

    $description = $_POST['description'];
    $username = $_SESSION['username'];

    $num = 1;

    require_once('includes/connection.php');
    $db_host = getDbHost();
    $db_password = getDbPassword();
    $db_username = getDbUser();
    $db_dbname = getDbDatabase();

    $conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);

    $tableID = getID($username, $table, $conn);
    $tableName = $username . "_" . $tableID;

    $returnedRow = getRow($tableID,$conn);

    function updateSession()
    {
        $table = $_SESSION['table'];
        return $table;
    }

    function getID($u, $tableName, $connection)
    {
        //$t = $u."_".$tableIDName;
        $sql = "SELECT ID FROM `user_presentations_table` WHERE user = '$u' AND presentation_name = '$tableName'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        $id = $row["ID"];
        $result->close();
        return $id;
    }

    function getRow($id, $connection) {
        $sql = "SELECT * FROM `user_presentations_table` WHERE ID = '$id'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        $result->close();
        return $row;
    }

    ?>

    <script>
        function updateDB(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "scripts/updateValuesDB.php?q=" + str, true);
                xmlhttp.send();
            } <?php updateSession(); ?>
        }
    </script>
</head>
<body>

<br/><br/><br/>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview">
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Presentation Header</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<br/>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Presentation Name</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=<?php echo $tableID; ?>&table=notimportant&user=<?php echo $username; ?>&cycle=notimportant&mode=1"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  value="<?php echo $returnedRow["presentation_name"] ?>"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Presentation Description</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=<?php echo $tableID; ?>&table=notimportant&user=notimportant&cycle=notimportant&mode=2"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  value="<?php echo $returnedRow["description"] ?>"/></div>
        <div class="col-sm-2"></div>
    </div>
</div>


<?php

$sqlRequest = "SELECT * FROM `$tableName`";
$assocArray = $conn->query($sqlRequest);

while ($row = $assocArray->fetch_assoc()) {

    $getRequestPresentationTable = "&i=$tableID&table=$table&user=$username&cycle=$num";


    echo '
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-3 editOverview"></div>
        <div class="col-sm-7 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>GROUP ';
    echo $num;
    echo '</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text" 
        class="form-control" 
        name="';
    echo $getRequestPresentationTable . "&mode=3";
    echo '"';
    echo ' onchange="updateDB(this.value.concat(this.name))"
        value="';
    echo $row["1"];
    echo '"/></div>
        <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2 editOverviewLeft">Subtitle</div>
                <div class="col-sm-7 editOverview"><input type="text" class="form-control" name="';
    echo $getRequestPresentationTable . "&mode=4";
    echo '" onchange="updateDB(this.value.concat(this.name))"
           value="';
    echo $row["subheader"];
    echo '"/></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2 editOverviewLeft">Description</div>
                <div class="col-sm-7 editOverview"><textarea class="form-control" style="height: 75px;" name="';
    echo $getRequestPresentationTable . "&mode=5";
    echo '" onchange="updateDB(this.value.concat(this.name))">';
    echo $row["description"];
    echo '</textarea>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2 editOverviewLeft">Chart type</div>
                <div class="col-sm-7 editOverview">
                    <select class="form-control" name="';
    echo $getRequestPresentationTable . "&mode=6";
    echo '"';
    echo ' onchange="updateDB(this.value.concat(this.name))"">
                        <option value="-1" selected>Choose chart type:</option>
                        <option value="0">Bar Chart</option>
                        <option value="4">Horizontal Bar Chart</option>
                        <option value="5">Line chart</option>
                        <option value="6">Stacked Line Chart</option>
                        <option value="2">Pie Chart</option>
                        <option value="3">Doughnut Chart</option>
                        <option value="1">Polar Area Chart</option>
                    </select></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2 editOverviewLeft">Icon</div>
                <div class="col-sm-7 editOverview">
                    <select class="form-control" name="';
    echo $getRequestPresentationTable . "&mode=7";
    echo '"';
    echo ' onchange="updateDB(this.value.concat(this.name))"">
                        <option value="-1" selected>Choose icon type</option>
                        <option value="0">Magnifying glass</option>
                    </select></div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        </div>
        <br/>
        <br>
    ';
    $num++;
}
?>

</body>
</html>
