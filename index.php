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
    ?>

</head>
<body>

<!-- Index site "intro" splash page -->
<div class="site-wrapper intro-splash">
    <div class="intro-splash-caption">
        <h1 class="intro-splash-headline"><img src="img/infopresenter_tmp_logo.png" class="img-responsive center-block"></h1>
        <p class="intro-splash-paragraph">A quick and easy way to create inforgraphic material for use in your presentations.
            <br/> Simply upload your spreadsheet and have something awesome to show off in no time</p>
        <!-- Spacing -->
        <br/>
    </div>
    <!-- Spacing for front-splash -->
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/>
</div>



<!-- Content containers, 3 small columns in accordance to the bootstrap grid system -->
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-4 col-custom">
            <p>&nbsp;</p>
            <h3>WHAT IS IT?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <p>&nbsp;</p>
            <!-- Bottom spacing --->
            <br/><br/><br/>
        </div>
        <div class="col-sm-4 col-custom">
            <p>&nbsp;</p>
            <h3>WHO IS IT?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <p>&nbsp;</p>
            <!-- Bottom spacing --->
            <br/><br/><br/>
        </div>
        <div class="col-sm-4 col-custom">
            <p>&nbsp;</p>
            <h3>WHERE IS IT?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <p>&nbsp;</p>
            <!-- Bottom spacing --->
            <br/><br/><br/>
        </div>
    </div>
</div>

<?php
include ("includes/footer.php");
?>

</body>
</html>