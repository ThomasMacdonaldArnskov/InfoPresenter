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
    header("Location: index.php");
}

$tableID = $_POST['table_id'];
//$presentationName = "Conspiracy Theories";
$username = $_SESSION['username'];
//$username = "tlma";

$nonValueFields = 6;

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

//$presentationNameDB = str_replace(' ', '', $tableID);
$presentationNameDB = $username . "_" . $tableID;

$rowCounterFetch = "SELECT * FROM `user_presentations_table` WHERE ID = '$tableID'";
$result = $conn->query($rowCounterFetch);
$descriptionFetch = $result->fetch_assoc();
$description = $descriptionFetch["description"];
$presentationName = $descriptionFetch["presentation_name"];
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
<br /><br /><br />
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center"><h6><?php $headline = strtoupper($presentationName);
                echo $headline ?></h6>
            <h4><?php echo $description ?></h4>
        </div>
        <div class="col-sm-2"></div>

    </div>
</div>
<br/><br/>
<?php
$num = 0;

$sqlRequest = "SELECT * FROM `$presentationNameDB`";
$assocArray = $conn->query($sqlRequest);
while ($row = $assocArray->fetch_assoc()) {

    $counter_array = array_filter($row, 'strlen');
    $field_cnt = count($counter_array);
    $field_cnt = $field_cnt - $nonValueFields;

    if ($num % 2 == 0) {
        echo '<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-1"></div>';
        if ($num%3==1){
            echo'<div class="col-sm-5 text-left col-custom">
            <h1 class="h1-inv">';
            echo $row["1"];
            echo '</h1>
            <P class="subtitle">';
            echo $row["subheader"];
            echo '</P><br/>
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $num . '" style="height: 300px;"></canvas>
            </div>
            <br/>
            <p>';
            echo $row["description"];
            echo '<br/></p><br />

        </div>';
        } else {
            echo'<div class="col-sm-5 text-left">
            <h1>';
            echo $row["1"];
            echo '</h1>
            <P class="subtitle">';
            echo $row["subheader"];
            echo '</P><br/>
    
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $num . '" style="height: 300px;"></canvas>
            </div>
            <br/>
            <p>';
            echo $row["description"];
            echo '<br /></p><br/>

        </div>';
        }
        createGraph($num, $field_cnt, $row, $nonValueFields, $row["charttype"]);
    } else {

        if ($num%3==1){
            echo'<div class="col-sm-5 text-right col-custom">
            <h1 class="h1-inv">';
            echo $row["1"];
            echo '</h1>
            <P class="subtitle-inv">';
            echo $row["subheader"];
            echo '</br></P><br/>
    
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $num . '" style="height: 300px;"></canvas>
            </div>
            <br/>
            <p>';
            echo $row["description"];
            echo '<br /></p><br />

        </div>';
        } else {
            echo'<div class="col-sm-5 text-right">
            <h1>';
            echo $row["1"];
            echo '</h1>
            <P class="subtitle">';
            echo $row["subheader"];
            echo '<br /></P><br/>
    
            <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:250%;"></span>
            <div id="container">
                <canvas id="chart' . $num . '" style="height: 300px;"></canvas>
            </div>
            <br/>
            <p>';
            echo $row["description"];
            echo '<br /></p><br />

        </div>';
        }
        echo'<div class="col-sm-1"></div> 
    </div>
</div>';

        createGraph($num, $field_cnt, $row, $nonValueFields, $row["charttype"]);
    }

    $num++;
}

function createGraph($i, $numberOfEntries, $dataArray, $offset, $chartType)
{
    $finalOffset = $offset-4;
    $graphColor = array("red", "orange", "yellow", "green", "blue");
    $chartArray = array("bar", "polarArea", "pie", "doughnut", "horizontalBar","line","line");

    echo '<script>';

    echo 'var color = Chart.helpers.color;';
    echo 'var barChartData' . $i . ' = {';

    if ($chartType == 0 || $chartType == 4) {
        echo 'labels: [""],';
    } else {
        echo labelGenerator($numberOfEntries);
    }
    echo 'datasets: [';
    if ($chartType == 0 || $chartType == 4) {
        for ($j = 0; $j < $numberOfEntries; $j++) {
            $dataIndex = $j + $finalOffset;
            $dataValue = strval($dataIndex);
            echo multipleDataSetGenerator($j, $dataArray[$dataValue], $graphColor);
        }
    } else {
        echo singleDataSetGenerator($numberOfEntries, $dataArray, $graphColor, $finalOffset,$chartType);
    }
    echo ']';
    echo '};';


    echo 'var ctx = document.getElementById("chart' . $i . '");';
    echo 'var chart' . $i . ' = new Chart(ctx, {';
    echo 'type: "' . $chartArray[$chartType] . '",';
    echo 'data: barChartData' . $i . ',';
    if ($chartType == 1) {
        //Polar area chart types
        echo 'options:';
        echo'{responsive: true, maintainAspectRatio: true,legend: {display:false}, title: {display: false,},scale: {display: false,ticks: {beginAtZero: true},reverse: false},animation: {animateRotate: true,animateScale: true}}';
    } else if ($chartType == 5 || 6) {
        //Line type charts
        echo'options: {responsive: true,maintainAspectRatio: true, layout: {padding: {top: 30, bottom: 20, left:20, right: 20}}, legend: {display:false, position: "bottom"},tooltips: { mode: "index",intersect: true,},hover: {mode: "nearest",intersect: true},scales: {xAxes: [{display: false,}],yAxes: [{display: false,}]}}';
    }
    else {
        //The rest
        echo 'options: {responsive: true,maintainAspectRatio: true,scales: {xAxes: [{    display: false}],yAxes: [{display: false}]},legend: {display: false}}';
    }
    echo '})</script>';
}

function multipleDataSetGenerator($labelNumber, $data, $colorArray)
{
    $graphColor = $colorArray;
    $codeGenerator = '{ label: "' . $labelNumber . '", backgroundColor: color(window.chartColors.' . $graphColor[$labelNumber % 5] . ').alpha(1).rgbString(), borderColor: window.chartColors.red, borderWidth: 0, data: [' . $data . '] },';
    return $codeGenerator;
}

function singleDataSetGenerator($numberOfEntries, $data, $colorArray, $offset,$chartType)
{

    $dataPoints = '';
    $colors = '';
    for ($i = 0; $i < $numberOfEntries; $i++) {
        if ($i == $numberOfEntries - 1) {
            $dataPoints = $dataPoints . $data[$i + $offset];
            $colors = $colors . "window.chartColors." . $colorArray[$i % 5];
        } else {
            $dataPoints = $dataPoints . $data[$i + $offset] . ",";
            $colors = $colors . "window.chartColors." . $colorArray[$i % 5] . ",";
        }
    }

    $codeGenerator = '{ label: "' . $numberOfEntries . '", backgroundColor: [' . $colors . '], borderColor: window.chartColors.red, borderWidth: 0, data: [' . $dataPoints . '], fill: false, pointRadius: 15';
    if ($chartType == 6) {
        $codeGenerator = $codeGenerator.",steppedLine: true,}";
    } else {
        $codeGenerator = $codeGenerator."},";
    }
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


$assocArray->close();
$conn->close();
?>
<br />
<br />
<br />


</body>

</html>
