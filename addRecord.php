<?php
	
	include 'controller.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$count = $_POST['count'];

	addRecord($id,$name,$count);
?>