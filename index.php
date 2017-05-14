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

    <script>
        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    </script>



</head>
<body>


<!-- Index site "intro" splash page -->
<div class="site-wrapper intro-splash" id="top">
    <div class="intro-splash-caption">
        <h1 class="intro-splash-headline"><img src="img/infopresenter_tmp_logo.png" class="img-responsive center-block">
        </h1>
        <p class="intro-splash-paragraph">A quick and easy way to create inforgraphic material for use in your
            presentations.
            <br/> Simply upload your spreadsheet and have something awesome to show off in no time</p>
        <!-- Spacing -->
        <br/>
    </div>
    <!-- Spacing for front-splash -->
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/>
</div>
    <br/><br/><br/><br/><br/>


<!-- Content containers, 3 small columns in accordance to the bootstrap grid system -->
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            <p>&nbsp;</p>
            <h3>WHAT IS IT?</h3>
            <p class="text-left">A fast and easy way to create a presentation of data. The idea is that you have data in
                an excel spreadsheet that you want to easily be able to present to others. Instead of fiddling around
                with creating graphs, importing those to indesign in order to create the overall structure, you can
                instead just upload the excel file to Infopresenter and have something cool looking without all the
                extra work</p>
            <p>&nbsp;</p>
            <!-- Bottom spacing --->
            <br/><br/><br/>
        </div>
        <div class="col-sm-4">
            <p>&nbsp;</p>
            <h3>HOW DOES IT WORK?</h3>
            <p class="text-left">First off you need some data in an excel sheet. Since this is only a prototype, the
                data has to be ordered in a certain way. First row of the sheet should contain the headers for the
                different data groups and there should be no spaces between the fields. Below each headline, the data
                should be put in column form (so that the headline of the column corresponds to the data in its column).
                Decimal numbers can be used, however be sure that they are written with a period not a comma in the data
                sheet. When the sheet is ready, save it as a .csv file. Create a new user on the website and upload your
                sheet. You will then be able to customize how the data is presented and lastly be able to view the
                created infographic.</p>
            <p>&nbsp;</p>
            <!-- Bottom spacing --->
            <br/><br/><br/>
        </div>
        <div class="col-sm-3">
            <p>&nbsp;</p>
            <h3>WHO ARE WE?</h3>
            <p class="text-left">We are 3 medialogy students from Aalborg University - Copenhagen. This site is created
                as a miniproject for the subject 'Technologies for Web and Social Media' on the 6th semester of the
                bachelor.</p>
            <br/>
            <p class="text-left">Thomas Laurits Macdonald Arnskov<br/>Niklas Rune Kristoffersen<br/>Jonas Litvinas</p>
            <p>&nbsp;</p>
            <!-- Bottom spacing --->
            <br/><br/><br/>
        </div>
        <div class="col-sm-1"></div>


    </div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br /><br /><br /><br /><br />
<div id="about"></div>
<div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
        <a href="#top" class="btn-block btn btn-success uploadpresentation">Back to the top</a>
    </div>
    <div class="col-sm-5"></div>
</div>
<br/><br/><br/>
<?php
include("includes/footer.php");
?>

</body>
</html>