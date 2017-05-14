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
                xmlhttp.open("GET", "scripts/checkName.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>

<!-- Spacing -->

<br/><br/><br/>

<div class="row">
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <div class="col-sm-8">
        <br/>
        <h1 class="text-center">Upload a new presentation</h1><br /><br />
        <div class="text-center">
            <i class="glyphicon glyphicon-upload" style="font-size: 200%; color: #0D3349;"></i>
        </div>
    </div>
    <div class="col-sm-2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

<!-- Spacing -->
<br/>

<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form enctype="multipart/form-data" action="presentation_uploaded.php" method="post" id="uploadform">
                <label for="name">Presentation title:</label>
                <input type="text"
                       class="form-control"
                       name="name"
                       onchange="validityVerifier(this.value)"
                       required><br>
                <label for="description">Description</label>
                    <textarea class="form-control" rows="5" name="description" required></textarea><br/>

                <input type="file" class="btn-block btn-file uploadpresentation" name="file" required/>
                <br />
                <input type="submit" class="btn-block btn btn-success uploadpresentation" value="Upload"/>
            </form>
            <br />
        </div>
        <div class="col-sm-4 text-left"><br /><div id="txtHint"><b>&nbsp</b></div>
        </div>
    </div>
</div>
<br /><br />

<?php
include("includes/footer.php");
?>
</body>
</html>