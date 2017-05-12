<?php

require_once('connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password,$db_dbname);

if (!empty($_POST)) {

$createuser = "INSERT INTO `users` (`id`, `usernames`, `passwords`) VALUES ('100', '3456', '1234')";
$connection->query($createuser);
}

