<!-- The general navigation menu or in other words the buttons without icons... -->
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a class="hidden-custom-semismall menu-header" href="index.php">INFOPRESENTER</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="upload_file.php">Upload</a></li>
                <li><a href="edit_presentation_overview.php">Edit</a></li>
                <li><a href="view_presentation_overview.php">View</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="member_page.php"><?php $username = $_SESSION['username']; echo ($username);?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>


