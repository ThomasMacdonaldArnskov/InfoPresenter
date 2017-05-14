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
    ?>

</head>
<body>

<!-- Spacing -->
<br/><br/><br/><br/><br/><br/>
<div class="row">
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-8">
        <br/>
        <h1 class="text-center">Choose a presentation to edit</h1><br /><br />
        <div class="text-center">
            <i class="glyphicon glyphicon-cog" style="font-size: 200%; color: #0D3349;"></i>
        </div>
    </div>
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>
<br />
<!-- Spacing -->
<br/>

<!-- Headline -->
<div class="row">
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-8">
        <br/>
        <h3 class="headline">Your presentations</h3>
        <hr>
    </div>
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

<!-- Spacing -->
<br/><br/>

<?php

//Connect to the database
require_once('includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

//Get which user it is that is logged in and store the information
$username = $_SESSION['username'];

$conn = new mysqli($db_host, $db_username, $db_password, $db_dbname);

//Select the presentations that is connected to the current username
$sql = "SELECT * FROM user_presentations_table WHERE user = '$username'";
$result = $conn->query($sql);
$num = 0;

//Run through the entire fetched array
while ($row = $result->fetch_assoc()) {
    //When starting a new row, create a div and add the left spacing
    if ($num % 4 == 0) {
        echo '<div class="row">
        <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>';
    }
    //Add background color for the 1st and 3rd column
    if ($num % 4 == 0 || $num % 4 == 2) {
        echo '<div class="col-sm-2 yourpresentations">
        <p>&nbsp;</p>
        <h3>';

        //Write the name of the presentation name fetched from the DB
        echo $row["presentation_name"];
        echo '</h3><p>';

        //And the description
        echo $row["description"];

        //Lastly, the link
        echo '</p>
        <p>&nbsp;</p>
        <form action ="edit_presentation.php" method="post">
        <input type="hidden" name="pres_name" value="';
        echo $row["presentation_name"];
        echo '">
        <input type="submit" class="btn-block btn btn-success uploadpresentation" name ="submit" value="Edit">
        </form>
        <!--<p><a href=\"#\" data-toggle="modal" data-target="#createNew">View presentation</a></p>-->
        <p>&nbsp;</p>
    </div>';
    } //Remove background color for the 2nd and 4th column
    else if ($num % 4 == 1 || $num % 4 == 3) {
        echo '<div class="col-sm-2 yourpresentations-inv">
        <p>&nbsp;</p>
        <h3>';
        echo $row["presentation_name"];
        echo '</h3><p>';
        echo $row["description"];
        //Lastly, the link
        echo '</p>
        <p>&nbsp;</p>
        <form action ="edit_presentation.php" method="post">
        <input type="hidden" name="pres_name" value="';
        echo $row["presentation_name"];
        echo '">
        <input type="submit" class="btn-block btn btn-success uploadpresentation" name ="submit" value="Edit">
        </form>
        <!--<p><a href=\"#\" data-toggle="modal" data-target="#createNew">View presentation</a></p>-->
        <p>&nbsp;</p>
    </div>';
    }
    $num++;

    //When hitting the forth column, add the right spacing
    if ($num % 4 == 0) {
        echo '<div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div><br />';
    }
}

//If conditions if there are not 4 entries in a row
if ($num % 4 == 1) {
    echo '<div class="col-sm-8">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div><br />';
} else if ($num % 4 == 2) {
    echo '<div class="col-sm-6">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div><br />';
} else if ($num % 4 == 3) {
    echo '<div class="col-sm-4">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div><br />';
}
$result->close();
$conn->close();
?>

<!-- Bottom spacing --->
<br/>

<!-- Bottom contact bar -->
<?php
include ("includes/footer.php");
?>

</body>
</html>