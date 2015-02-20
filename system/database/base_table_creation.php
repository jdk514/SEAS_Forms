<?php
include "../../application/config/environment_variables.php";

//Connect to database
echo $password;
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

/* Script has not been told anything, exit */
if ($argc <= 1) {
	echo "Please use 'destroy' or 'create' with this script to create/destroy the table";
	exit();
}

/* If script is told to destroy the tables */
if ($argv[1] == "destroy") {
	$sql = "DROP DATABASE SEASForms";
	if ($conn->query($sql) === TRUE) {
	    echo "Database dropped\n";
	} else {
	    echo "Error dropping tables: " . $conn->error;
	}
	$conn->close();
	exit();		
} else if ($argv[1] == "create") {

	$sql = "CREATE DATABASE IF NOT EXISTS SEASForms";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully\n";
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	$conn->close();

	$conn = new mysqli($servername, $username, $password, $database);

	$sql = "CREATE TABLE IF NOT EXISTS students (gwid VARCHAR(9) PRIMARY KEY, major VARCHAR(5), year VARCHAR(10));" .
			"CREATE TABLE IF NOT EXISTS faculty (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100), major VARCHAR(5) NOT NULL);" .
			"CREATE TABLE IF NOT EXISTS forms (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, form_name VARCHAR(255));" .
			"CREATE TABLE IF NOT EXISTS sub_forms (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, fid INT FOREIGN KEY NOT NULL, sub_form_name VARCHAR(255) NOT NULL);" .
			"CREATE TABLE IF NOT EXISTS admins (id TINYINT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT, username VARCHAR(10) NOT NULL, password VARCHAR(100) NOT NULL);";
	if ($conn->multi_query($sql) === TRUE) {
		echo "Tables Created\n";
		echo $conn->error;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>