<?php

require_once('includes/connection.php');
$db_host = getDbHost();
$db_password = getDbPassword();
$db_username = getDbUser();
$db_dbname = getDbDatabase();

$conn = new mysqli($db_host, $db_username, $db_password,$db_dbname);


$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`

/* Validate the form on the server side */
if (empty($_POST['name'])) { //Name cannot be empty
    $createuser = "INSERT INTO `users` (`id`, `usernames`, `passwords`) VALUES ('100', '3456', '1234')";
    $connection->query($createuser);

    $errors['name'] = 'Name cannot be blank';
}
if (!empty($_POST['name'])) {

}

/*
if (!empty($errors)) { //If errors in validation
$form_data['success'] = false;
$form_data['errors']  = $errors;
}
else { //If not, process the form, and return true on success
$form_data['success'] = true;
$form_data['posted'] = 'Data Was Posted Successfully';
}
*/
//Return the data back to form.php
echo json_encode($form_data);