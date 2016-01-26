<?php

	function connection() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "sampleDB";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		return $conn;
	}

//DATE_ADD('2010-12-31 23:59:59',INTERVAL 1 DAY);

	function addRecord($id,$name,$count){
		//Open Connection

		$conn = connection();

		//$sql = "INSERT INTO sampleTable (id, name, date) VALUES ($id, '$name', CURDATE())";
		$sql = "INSERT INTO sampleTable (id, name, date) VALUES ($id, '$name', DATE_ADD(CURDATE(),INTERVAL 7 DAY))";
		
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	function viewRecordById($id){
		$object = array();
		$conn = connection() ;

		$sql = "SELECT * FROM sampleTable where id=$id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object['id'] = $row["id"];
		    	$object['name'] = $row["name"];
		    	$object['date'] = $row["date"];
		    	$object['count'] = $row["count"];
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		return json_encode($object);
	}


	function updateRecord($id){
		
	}

	function deleteRecord($id){
		
	}

	function viewAllRecords(){
		$arrayObject = array();
		$conn = connection() ;

		$sql = "SELECT * FROM sampleTable";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['id'] = $row["id"];
		    	$object['name'] = $row["name"];
		    	$object['date'] = $row["date"];
		    	$object['count'] = $row["count"];

		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		return json_encode($arrayObject);
	}
?>