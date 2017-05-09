<?php session_start(); ?>

<!doctype html>
<html>

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
//$presname = "pres";
$username = $_SESSION['username'];
//$username = "tlma";

$non_value_fields = 2;

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

$presname_db = str_replace(' ', '', $presname);
$presname_db = $username . "_" . $presname_db;

$rowcounterfetch = "SELECT * FROM `$presname_db`";
$rowresult = $conn->query($rowcounterfetch);
$row_cnt = $rowresult->num_rows;
$rowresult->close();

$graphcolor = array("backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),", "backgroundColor: color(window.chartColors.orange).alpha(1).rgbString(),", "backgroundColor: color(window.chartColors.yellow).alpha(1).rgbString(),", "backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),");
$bordercolor = array("borderColor: window.chartColors.red,", "borderColor: window.chartColors.orange,", "borderColor: window.chartColors.yellow,", "borderColor: window.chartColors.green,");

$sql = "SELECT * FROM `$presname_db` WHERE id = '1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$counter_array = array_filter($row, 'strlen');

$field_cnt = count($counter_array);
$field_cnt = $field_cnt - $non_value_fields;
$result->close();
?>

<head>
    <script src="vendor/nnnick/chartjs/dist/Chart.bundle.js"></script>
    <script src="vendor/nnnick/chartjs/samples/utils.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>
<body>
<br/><br/><br/><br/><br/>
<H6 class="text-center">Presentation title</H6>
<br/><br/><br/>
<?php
$num = 0;

for ($i = 0; $i < $row_cnt; $i++) {
    $idsrc = $i + 1;
    $sql = "SELECT * FROM `$presname_db` WHERE id = '$idsrc'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $counter_array = array_filter($row, 'strlen');

    $field_cnt = count($counter_array);
    $field_cnt = $field_cnt - $non_value_fields;
    $result->close();

    if ($num % 2 == 0) {
        echo '<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5 text-right">
            <h1>';
        echo $row["1"];
        echo '</h1>
            <P>FILMED IN NEVADA</P><br/>
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $i . '"></canvas>
            </div>
            <br/>
            <p>Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut,
                nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam
                justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat. At
                vestibulum donec massa purus ut augue, mauris sed magna ipsum omnis amet, vestibulum laoreet dolor,
                aliquam ipsum risus tempus ut eros, fusce purus urna ullamcorper lobortis</p>

        </div>';
    }

    if ($num % 2 == 1) {
        echo '<div class="col-sm-5 text-right">
            <h1>';
        echo $row["1"];
        echo '</h1>
            <P>FILMED IN NEVADA</P><br/>
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $i . '"></canvas>
            </div>
            <br/>
            <p>Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut,
                nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam
                justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat. At
                vestibulum donec massa purus ut augue, mauris sed magna ipsum omnis amet, vestibulum laoreet dolor,
                aliquam ipsum risus tempus ut eros, fusce purus urna ullamcorper lobortis</p>

        </div>
        <div class="col-sm-1"></div> 
    </div>
</div>';


        $num++;
    }

    echo '<script>';

    echo 'var color = Chart.helpers.color;';

    echo 'var barChartData'.$i.' = {';

    echo 'labels: [""],';
    echo 'datasets: [{';
    for ($s = 0; $s < $field_cnt; $s++) {
        $index = $s + 2;
        echo 'label: "Row ' . $s . '",';
        echo $graphcolor[$s % 4];
        echo 'borderColor: window.chartColors.red,';
        echo 'borderWidth: 0,';
        echo 'data: [';
        echo $row["$index"];
        echo ']';
        echo '},';

        if ($s != $field_cnt - 1) {
            echo '{';
        }
    }

    echo ']';
    echo '};';


    echo 'var ctx = document.getElementById("chart'.$i.'");';
    echo 'var chart'.$i.' = new Chart(ctx, {';
    echo 'type: "bar",';
    echo 'data: barChartData'.$i.',';
    echo 'options: {';
    echo 'scales: {';
    echo 'xAxes: [{';
    echo'    display: false';

    echo '}],';
    echo 'yAxes: [{';

    echo 'display: false';

    echo '}]';
    echo '},';
    echo 'legend: {';
    echo 'display: false';
    echo '}';
    echo '}';
    echo '})';
    echo'</script>'; } ?>
</body>

</html>
