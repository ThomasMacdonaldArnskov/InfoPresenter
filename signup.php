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
        header("Location: index.php");
    } else {
        include('includes/menu.php');
    }
?>

    <script>
        function validityVerifier(str) {
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
                xmlhttp.open("GET", "scripts/checkValidity.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>

<br /><br /><br /><br /><br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="img/avatar_tmp.png" class="avatar"><br /><h1 class="text-center">Sign up</h1>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <br/><br/>
            <form method="post" action="/WebPresenter/register_complete.php">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="username"
                           type="text"
                           class="form-control"
                           name="username"
                           placeholder="Username"
                           maxlength="25"
                           onchange="validityVerifier(this.value)"
                           required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password"
                           placeholder="Password" maxlength="50" required>
                </div>
                <br />


                <button type="submit" class="btn-block btn btn-success uploadpresentation" name="register_submit">
                    Sign Up
                </button>

            </form>
            <br />
            <div id="txtHint"><b>&nbsp;<br />&nbsp;</b></div>

        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<br /><br /><br /><br />





<br/><br/><br/><br /><br /><br />

<?php
include("includes/footer.php");
?>

</body>
</html>