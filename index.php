<?php
	$server	= 'localhost';
	$username	= 'root';
	$password	= 'root';
	$database	= 'PW7';
    
	// Establish a connection with the database

	$conn	= mysqli_connect ($server, $username, $password, $database);

	// Check the connection with the database

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	  }

	// Create a query

	$sql	= "SELECT * FROM Book";

	// Execute the query

	$books_Result	= mysqli_query ($conn, $sql);

	while ($row = mysqli_fetch_assoc($books_Result))
	{
		$row_array = [];

		$row_array['Book_id'] = $row['Book_id'];
		$row_array['title'] = $row['title'];
		$row_array['year'] = $row['year'];
		$row_array['price'] = $row['price'];
		$row_array['category'] = $row['category'];
		
		$result[] = $row_array;
	}

	echo json_encode ($result, JSON_PRETTY_PRINT);
?>

