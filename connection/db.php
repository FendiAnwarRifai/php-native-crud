<?php
	$HOST="localhost";
	$DB_USER="root";
	$DB_PASSWORD="";
	$DB_NAME="crud_book";
	$link=mysqli_connect($HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
	if (!$link) {
		die("Cannot connect, ".mysqli_connect_error());
	}
?>