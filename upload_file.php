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

<!-- Spacing -->
<br/><br/><br/><br/><br/><br/>

<div class="row">
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2">
        <div class="createNew">
        <p>&nbsp</p>
            <a href="#" data-toggle="modal" data-target="#createNew">Create new presentation</a>
            <p>&nbsp</p>
        </div>

    </div>
    <div class="col-sm-1">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2 createNew">
            <p>TEST</p>
            <a href="#" data-toggle="modal" data-target="#createNew">Create new presentation</a>
            <p>&nbsp;</p>
    </div>
    <div class="col-sm-1">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-2 createNew">
            <p>TEST</p>
            <a href="#" data-toggle="modal" data-target="#createNew">Create new presentation</a>
            <p>&nbsp;</p>
    </div>
    <div class="col-sm-2">
        <p>&nbsp;</p>

        <p>&nbsp;</p>
    </div>
</div>
</div>

<!-- Bottom spacing --->
<br/><br/><br/>

<!-- Bottom contact bar -->
<div class="sitewrapper contact-bottom-bar">
    <p class="bottom-bar-text">Contact info</p>
</div>


<!-- The modal overlay when you press on the sign up button! -->
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


                        <form enctype="multipart/form-data" action="test.php" method="post">
                            Name: <input type="text" name="name" required><br>
                            <input type="file" class="login-modal-btn" name="file" required/></td>
                            <input type="submit" class="login-modal-btn" value="Upload"/>
                        </form>


                        <!--
                        <form method="post" action="/WebPresenter/register_complete.php">
                            <input type="text" placeholder="Enter Username" name="username" maxlength="50" required>
                            <input type="password" placeholder="Enter Password" name="password" maxlength="50" required>
                            <button type="submit" class="login-modal-btn" name="register_submit">Signup</button>
                            <p>*Note that the bla bla bla</p>
                        </form> -->
                        <!--<input type="checkbox" checked="checked" class="login-modal-remember-me-btn"> Remember me -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>