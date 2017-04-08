<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

    <?php
    include('includes/login_script.php');
    include('includes/header.php');

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        include('menuMember.php');
        echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
        echo '<a href="logout.php">Logout</a>';
    } else {
        include('includes/menu.php');
    }
    ?>

</head>
<body>

<br/><br/><br/>
<h1>Header test</h1>
<h3>Subheader test</h3>
<p>Paragraph test</p>
<pre>Preformatted test</pre>
<blockquote>Blockquote test</blockquote>

</body>
</html>