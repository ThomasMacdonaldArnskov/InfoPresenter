<div class="dropdown show smallMenu">
    <a class="btn btn-secondary" dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <a class="dropdown-item" href="index.php">Home</a><br />
        <a class="dropdown-item" href="index.php#about">About</a><br />
        <a class="dropdown-item" href="upload_file.php">Upload</a> <br />
        <a class="dropdown-item" href="edit_presentation_overview.php">Edit</a><br />
        <a class="dropdown-item" href="view_presentation_overview.php">View<br />
        <a class="dropdown-item" href="member_page.php"><?php $username = $_SESSION['username']; echo ($username);?></a><br/>
        <a class="dropdown-item" href="logout.php">Logout</a><br />
    </div>
</div>