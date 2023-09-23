<?php
	
	$servername = "localhost";
	$database = "rumah_teknologi2";
	$username = "root";
	$password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
	function redirect($page)
	{
		header("Location: $page");
		exit;
	}

	function read($query)
	{
		global $conn;
		$result = mysqli_query($conn, $query);

		if (mysqli_affected_rows($conn) <= 0) {
			echo mysqli_error($conn);
		}

		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	function cud($query)
	{
		global $conn;
		mysqli_query($conn, $query);
		if (mysqli_affected_rows($conn) <= 0) 
		{
			echo mysqli_error($conn);
		}
	}

	function check_login()
	{
		if (!isset($_SESSION["login"])) {
			redirect('login.php');
		}
	}

	function findId(){
		if (!isset($_GET['id'])) 
		{
			redirect('index.php');
		}
	}
?>