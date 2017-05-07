<?php

require_once('includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();
$conn = new mysqli($db_host, $db_username, $db_password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE `webpresenter`";
$conn->query($sql);
echo "DATABASE CREATED <br />";
$conn->close();

$connection = new mysqli($db_host, $db_username, $db_password, $db_dbname);

$createUsers = "CREATE TABLE `webpresenter`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `usernames` VARCHAR(255) NOT NULL , `passwords` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$connection->query($createUsers);
echo "USER TABLE CREATED<br />";

$createPresentationtable = "CREATE TABLE `webpresenter`.`user_presentations_table` ( `id` INT NOT NULL AUTO_INCREMENT , `user` VARCHAR(255) NOT NULL , `presentation_name` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$connection->query($createPresentationtable);
echo "PRESENTATION OVERVIEW TABLE CREATED";

$connection->close();




