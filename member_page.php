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
        //include('includes/menu.php');
        header("Location: index.php");
    }
    ?>

</head>
<body>

<!-- Spacing -->
<br/><br/><br/><br />

<!-- Content containers, 3 small columns in accordance to the bootstrap grid system -->
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-4 col-custom">
            <p>&nbsp;</p>
            <h3>WHAT IS IT?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <p>&nbsp;</p>
        </div>
        <div class="col-sm-4 col-custom">
            <p>&nbsp;</p>
            <h3>WHO IS IT?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <p>&nbsp;</p>
        </div>
        <div class="col-sm-4 col-custom">
            <p>&nbsp;</p>
            <h3>WHERE IS IT?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <p>&nbsp;</p>
        </div>
    </div>
</div>


<!-- Temporary Spacing --->
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/>

<!-- Bottom spacing --->
<br/><br/><br/>

<!-- Bottom contact bar -->
<?php
include ("includes/footer.php");
?>


</body>
</html>