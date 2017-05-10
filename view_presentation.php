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

$presentationName = $_POST['pres_name'];
//$presentationName = "Conspiracy Theories";
$username = $_SESSION['username'];
//$username = "tlma";

$nonValueFields = 3;

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

$presentationNameDB = str_replace(' ', '', $presentationName);
$presentationNameDB = $username . "_" . $presentationNameDB;

$rowCounterFetch = "SELECT * FROM `user_presentations_table` WHERE user = '$username' AND presentation_name = '$presentationName'";
$result = $conn->query($rowCounterFetch);
$descriptionFetch = $result->fetch_assoc();
$description = $descriptionFetch["description"];

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
<div class="col-custom2"><br/><br/><br/></div>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-8 text-left"><h6><?php $headline = strtoupper($presentationName);
                echo $headline ?></h6></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-8 text-left"><h4><?php echo $description ?></h4></div>
        <div class="col-sm-4"></div>
    </div>
</div>
<HR>
<?php
$num = 0;

$sql = "SELECT * FROM `$presentationNameDB`";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

    $counter_array = array_filter($row, 'strlen');
    $field_cnt = count($counter_array);
    $field_cnt = $field_cnt - $nonValueFields;

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
                <canvas id="chart' . $num . '" style="height: 300px;"></canvas>
            </div>
            <br/>
            <p>Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut,
                nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam
                justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat. At
                vestibulum donec massa purus ut augue, mauris sed magna ipsum omnis amet, vestibulum laoreet dolor,
                aliquam ipsum risus tempus ut eros, fusce purus urna ullamcorper lobortis</p>

        </div>';
        createGraph($num, $field_cnt, $row, $nonValueFields, $row["charttype"]);
    } else {

        echo '<div class="col-sm-5 text-right">
            <h1>';
        echo $row["1"];
        echo '</h1>
            <P>FILMED IN NEVADA</P><br/>
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $num . '"style="height: 300px;"></canvas>
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

        createGraph($num, $field_cnt, $row, $nonValueFields, $row["charttype"]);
    }

    $num++;
}

function createGraph($i, $numberOfEntries, $dataArray, $offset, $chartType)
{
    $graphColor = array("red", "orange", "yellow", "green", "blue");
    $chartArray = array("bar", "polarArea", "pie", "doughnut", "horizontalBar");

    echo '<script>';

    echo 'var color = Chart.helpers.color;';
    echo 'var barChartData' . $i . ' = {';

    if ($chartType == 0 || $chartType == 4) {
        echo 'labels: [""],';
    } else {
        labelGenerator($numberOfEntries);
    }
    echo 'datasets: [';
    if ($chartType == 0 || $chartType == 4) {
        for ($j = 0; $j < $numberOfEntries; $j++) {
            $dataIndex = $j + $offset - 1;
            $dataValue = strval($dataIndex);
            echo multipleDataSetGenerator($j, $dataArray[$dataValue], $graphColor);
        }
    } else {
        echo singleDataSetGenerator($numberOfEntries, $dataArray, $graphColor, $offset);
    }
    echo ']';
    echo '};';


    echo 'var ctx = document.getElementById("chart' . $i . '");';
    echo 'var chart' . $i . ' = new Chart(ctx, {';
    echo 'type: "' . $chartArray[$chartType] . '",';
    echo 'data: barChartData' . $i . ',';
    if ($chartType == 1) {
        echo 'options: {
            responsive: true,
            legend: {
                display:false
            },
            title: {
                display: false,
            },
            scale: {
                display: false,
                ticks: {
                    beginAtZero: true
                },
                reverse: false
            },
            animation: {
                animateRotate: true,
                animateScale: true
            }
        }';
    }
    if ($chartType != 1) {
        echo 'options: {responsive: true, 
        maintainAspectRatio: false,scales: {xAxes: [{    display: false}],yAxes: [{display: false}]},legend: {display: false}}';
    }
    echo '})</script>';
}

function multipleDataSetGenerator($labelNumber, $data, $colorArray)
{
    $graphColor = $colorArray;
    $codeGenerator = '{ label: "' . $labelNumber . '", backgroundColor: color(window.chartColors.' . $graphColor[$labelNumber % 5] . ').alpha(1).rgbString(), borderColor: window.chartColors.red, borderWidth: 0, data: [' . $data . '] },';
    return $codeGenerator;
}

function singleDataSetGenerator($numberOfEntries, $data, $colorArray, $offset)
{

    $dataPoints = '';
    $colors = '';
    for ($i = 0; $i < $numberOfEntries; $i++) {
        if ($i == $numberOfEntries - 1) {
            $dataPoints = $dataPoints . $data[$i + $offset - 1];
            $colors = $colors . "window.chartColors." . $colorArray[$i % 5];
        } else {
            $dataPoints = $dataPoints . $data[$i + $offset - 1] . ",";
            $colors = $colors . "window.chartColors." . $colorArray[$i % 5] . ",";
        }
    }

    $codeGenerator = '{ label: "' . $numberOfEntries . '", backgroundColor: [' . $colors . '], borderColor: window.chartColors.red, borderWidth: 0, data: [' . $dataPoints . '] },';
    return $codeGenerator;
}

function labelGenerator($numberOfLabels)
{
    $label = '';
    for ($i = 0; $i < $numberOfLabels; $i++) {
        $label .= '"",';
    }
    $returnValue = 'labels: [' . $label . '],';

    return $returnValue;
}


$result->close();
$conn->close();
?>


</body>

</html>
