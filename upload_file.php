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

<!-- The upload new presentation button -->
<div class="row">
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <a href="#" class="" data-toggle="modal" data-target="#createNew">
        <div class="col-sm-8 btn createNew uploadpresentation">
            + UPLOAD NEW PRESENTATION
        </div>
    </a>
    <br/>
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

<!-- Spacing -->
<br/><br/><br/>

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
$sql = "SELECT user, presentation_name, description FROM user_presentations_table WHERE user = '$username'";
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
        <form action ="view_presentation.php" method="post">
        <input type="hidden" name="pres_name" value="';
        echo $row["presentation_name"];
        echo '">
        <input type="submit" class="btn" name ="submit" value="View">
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
        <form action ="view_presentation.php" method="post">
        <input type="hidden" name="pres_name" value="';
        echo $row["presentation_name"];
        echo '">
        <input type="submit" class="btn" name ="submit" value="View">
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


<!-- Saved for reference. The code used above, written out as plain html without accessing the database -->
<!--
<div class="row">
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2 yourpresentations">
        <p>&nbsp;</p>
        <h3>Headline</h3>
        <p>Presentation description goes here. Just a little text that explains what the project is about</p>
        <p>&nbsp;</p>
        <p><a href="#" data-toggle="modal" data-target="#createNew">Here goes the link to the presentation</a></p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2 yourpresentations-inv">
        <p>&nbsp;</p>
        <h3>Headline</h3>
        <p>Presentation description goes here. Just a little text that explains what the project is about</p>
        <p>&nbsp;</p>
        <p><a href="#" data-toggle="modal" data-target="#createNew">Here goes the link to the presentation</a></p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2 yourpresentations">
        <p>&nbsp;</p>
        <h3>Headline</h3>
        <p>Presentation description goes here. Just a little text that explains what the project is about</p>
        <p>&nbsp;</p>
        <p><a href="#" data-toggle="modal" data-target="#createNew">Here goes the link to the presentation</a></p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2 yourpresentations-inv">
        <p>&nbsp;</p>
        <h3>Headline</h3>
        <p>Presentation description goes here. Just a little text that explains what the project is about</p>
        <p>&nbsp;</p>
        <p><a href="#" data-toggle="modal" data-target="#createNew">Here goes the link to the presentation</a></p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>
-->

<!-- Bottom spacing --->
<br/><br/><br/>

<!-- Bottom contact bar -->
<?php
include ("includes/footer.php");
?>


<!-- The modal overlay when you press on the upload new button! -->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="createNew" role="dialog">
        <div class="modal-dialog modal-sl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <img src="img/avatar_tmp.png" class="avatar">
                </div>
                <div class="modal-body">
                    <div class="loginmodal-container">
                        <form enctype="multipart/form-data" action="presentation_uploaded.php" method="post"
                              id="uploadform">
                            <label for="name">Presentation title:</label>
                            <input type="text" name="name" required><br>
                            <div class="form-group">
                                <br/>
                                <label for="comment">Presentation description:</label>
                                <textarea class="form-control" rows="5" name="description" required></textarea>
                            </div>
                            <input type="file" class="login-modal-btn" name="file" required/>
                            <input type="submit" class="login-modal-btn" value="Upload"/>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>