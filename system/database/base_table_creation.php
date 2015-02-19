<?php
include "../../application/config/environment_variables.php";
/* Script has not been told anything, exit */
if ($argc <= 1) {
	echo "Please use 'destroy' or 'create' with this script to create/destroy the table";
	exit();
}

/* If script is told to destroy the tables */
if ($argv[1] == "destroy") {
	$sql = "DROP TABLE Students, Faculty, Forms";
	if ($conn->query($sql) === TRUE) {
	    echo "Database dropped\n";
	} else {
	    echo "Error dropping tables: " . $conn->error;
	}
	$conn->close();
	exit();
} else if ($argv[1] == "create") {

/*	$sql = "CREATE DATABASE IF NOT EXISTS {$database}";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully\n";
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	$conn->close();*/

	$conn = new mysqli($servername, $username, $password, $database);

	$sql = "CREATE TABLE IF NOT EXISTS students (gwid VARCHAR(9) PRIMARY KEY, major VARCHAR(5), year VARCHAR(10));" .
			"CREATE TABLE IF NOT EXISTS faculty (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100), major VARCHAR(5) NOT NULL);" .
			"CREATE TABLE IF NOT EXISTS forms (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, form_name VARCHAR(255));" .
			"CREATE TABLE IF NOT EXISTS sub_forms;
	if ($conn->multi_query($sql) === TRUE) {
		echo "Tables Created\n";
		echo $conn->error;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>