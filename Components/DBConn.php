<?php
// Database configuration
$dbhost = "localhost";
$dbuser = "root";
$password = "";
$db = "hurtownia_art_spoz";

// Function to open a database connection
function OpenCon() {
    global $dbhost, $dbuser, $password, $db; // Use global variables
    $conn = new mysqli($dbhost, $dbuser, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to close the database connection
function CloseConnection($conn) {
    $conn->close();
}
