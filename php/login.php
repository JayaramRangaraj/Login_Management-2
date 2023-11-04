<?php
session_start();

// This pulls the MongoDB driver from the vendor folder
require_once  '../vendor/autoload.php';

// Connect to the MongoDB Database
$databaseConnection = new MongoDB\Client;

// Connecting to a specific database in MongoDB
$myDatabase = $databaseConnection->GuviDB;

// Connecting to our MongoDB Collections
$usersCollection = $myDatabase->users;

$email = ""; // Initialize the email variable
$password = ""; // Initialize the password variable

if(isset($_POST['login'])){
    $email = $_POST['LoginEmail']; // Use 'LoginEmail' to match the form's input name
    $password = sha1($_POST['LoginPassword']); // Use 'LoginPassword' to match the form's input name
}

$data = array(
    "email" => $email,
    "password" => $password
);

// Fetch user from MongoDB Users Collection
$fetch = $usersCollection->findOne($data);

if($fetch){
    // Create a session
    // Redirect to the profile page
    header("Location: ../profile.html");
    exit();
}
else{
    ?>
    <center><h4 style="color: red;">User Not Found</h4></center>
    <?php
}
?>