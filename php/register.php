<?php
require_once '../vendor/autoload.php';

// Connection to the MongoDB
$databaseConnection = new MongoDB\Client;

// Connection to the actual database in MongoDB
$mydb = $databaseConnection->GuviDB;

// Connection to the "users" collection
$usersCollection = $mydb->users;
    // Data received from the registration form
    $name = $_POST['RegisterName'];
    $email = $_POST['RegisterEmail'];
    $password = $_POST['RegisterPassword'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "Invalid input data. Please provide valid data.";
    } else {
        // Create a document with the user's data
        $userDocument = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];

        // Insert the user's document into the "users" collection
        $insertResult = $usersCollection->insertOne($userDocument);

        if ($insertResult) {
            echo json_encode(['message' => 'User data has been successfully stored in the database.']);
        } else {
            echo json_encode(['message' => 'Failed to insert user data into the database.']);
        }
        
    }
?>
