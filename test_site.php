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

//$presname = $_POST['pres_name'];
//$username = $_SESSION['username'];

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

$sql = "SELECT * FROM `tlma_pres`";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$field_cnt = $result->field_count;
$field_cnt=$field_cnt-2;
$row_cnt = $result->num_rows;


?>

<head>
    <title>Bar Chart</title>
    <br/><br/><br/><br/>
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
<div id="container" style="width: 75%;">
    <canvas id="canvas"></canvas>
</div>
<script>
    //var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var color = Chart.helpers.color;
    var barChartData = {
    <?php
    echo 'labels: ["", "", "", "", "", "", ""],';
    echo 'datasets: [{';
    for ($i = 0; $i < $field_cnt; $i++) {
        $index = $i+2;
        echo 'label: "' . $i . '",';
        echo 'backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),';
        echo 'borderColor: window.chartColors.red,';
        echo 'borderWidth: 1,';
        echo 'data: [';
        echo $row["$index"];
        echo ']';
        echo '},';

        if ($i != $field_cnt-1) {
            echo '{';
        }
    }
    ?>


    //      labels: ["January", "February", "March", "April", "May", "June", "July"],
    //      datasets: [{
    //          label: 'Dataset 1',
    //          backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    //          borderColor: window.chartColors.red,
    //          borderWidth: 1,
    //          data: [
    //              randomScalingFactor(),
    //              randomScalingFactor(),
    //              randomScalingFactor(),
    //            randomScalingFactor(),
    //            randomScalingFactor(),
    //            randomScalingFactor(),
    //            randomScalingFactor()
    //          ]},

    //    {
    //      label: 'Dataset 2',
    //          backgroundColor
    //  :
    //      color(window.chartColors.blue).alpha(1).rgbString(),
    //          borderColor
    //  :
    //      window.chartColors.blue,
    //          borderWidth
    //  :
    //      1,
    //          data
    //  :
    //      [
    //          randomScalingFactor(),
    //          randomScalingFactor(),
    //          randomScalingFactor(),
    //          randomScalingFactor(),
    //          randomScalingFactor(),
    //          randomScalingFactor(),
    //          randomScalingFactor()
    //      ]
    //  }
    ]

    }
    ;

    window.onload = function () {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        });

    };

    document.getElementById('randomizeData').addEventListener('click', function () {
        var zero = Math.random() < 0.2 ? true : false;
        barChartData.datasets.forEach(function (dataset) {
            dataset.data = dataset.data.map(function () {
                return zero ? 0.0 : randomScalingFactor();
            });

        });
        window.myBar.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function () {
        var colorName = colorNames[barChartData.datasets.length % colorNames.length];
        ;
        var dsColor = window.chartColors[colorName];
        var newDataset = {
            label: 'Dataset ' + barChartData.datasets.length,
            backgroundColor: color(dsColor).alpha(0.5).rgbString(),
            borderColor: dsColor,
            borderWidth: 1,
            data: []
        };

        for (var index = 0; index < barChartData.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
        }

        barChartData.datasets.push(newDataset);
        window.myBar.update();
    });

    document.getElementById('addData').addEventListener('click', function () {
        if (barChartData.datasets.length > 0) {
            var month = MONTHS[barChartData.labels.length % MONTHS.length];
            barChartData.labels.push(month);

            for (var index = 0; index < barChartData.datasets.length; ++index) {
                //window.myBar.addData(randomScalingFactor(), index);
                barChartData.datasets[index].data.push(randomScalingFactor());
            }

            window.myBar.update();
        }
    });

    document.getElementById('removeDataset').addEventListener('click', function () {
        barChartData.datasets.splice(0, 1);
        window.myBar.update();
    });

    document.getElementById('removeData').addEventListener('click', function () {
        barChartData.labels.splice(-1, 1); // remove the label first

        barChartData.datasets.forEach(function (dataset, datasetIndex) {
            dataset.data.pop();
        });

        window.myBar.update();
    });
</script>

<?php

?>
</body>

</html>
