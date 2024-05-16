<?php
// Basic connection settings
$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = 'my-secret-pw';
$databaseName = 'rolodex';

// Connect to the database
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
