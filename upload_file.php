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

    <script>
        $("#upload").click(function(e){
            e.preventDefault();
            //show loading gif
            $(this).closest('form').submit();
        });
    </script>

    <script>
        function show (toBlock){
            setDisplay(toBlock, 'block');
        }
        function hide (toNone) {
            setDisplay(toNone, 'none');
        }
        function setDisplay (target, str) {
            document.getElementById(target).style.display = str;
        }
    </script>
</head>
<body>
<div id="fader"></div>

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
                       id="prestitle"
                       class="form-control"
                       name="name"
                       onchange="validityVerifier(this.value)"
                       value="Title"><br>
                <label for="description">Description</label>
                    <textarea id="presdescrip" class="form-control" rows="5" name="description">Description</textarea><br/>

                <input type="file" id="dataset" class="btn-block btn-file uploadpresentation" name="file"/>
                <br />
                <input type="submit" id="upload" class="btn-block btn btn-success uploadpresentation" id="loaderhide" onclick="show('loadanim'); hide('loaderhide')" value="Upload"/>
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

<div id="loadanim" style="display:none;"><div class="overlay"><div class="loader"></div></div></div>


</body>
</html>