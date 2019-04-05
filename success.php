<?php
	include 'db.php';
	session_start();
	$session_username = $_SESSION['username'];
	$status = $_POST['status'];

	if($session_username == 'osa'){
		$updateQuery = "UPDATE tbl_records SET osa_status = '$status'";
		$execQuery = mysqli_query($db, $updateQuery);
		echo "
		<script>
			alert('Successfully Cleared!');
			window.location.href='view.php';
		</script>";
	}
	if($session_username == 'lib'){
		$updateQuery = "UPDATE tbl_records SET lib_status = '$status'";	
		$execQuery = mysqli_query($db, $updateQuery);
		echo "
		<script>
			alert('Successfully Cleared!');
			window.location.href='view.php';
		</script>";
	}
	if($session_username == 'faculty'){
		$updateQuery = "UPDATE tbl_records SET faculty_status = '$status'";
		$execQuery = mysqli_query($db, $updateQuery);
		echo "
		<script>
			alert('Successfully Cleared!');
			window.location.href='view.php';
		</script>";
	}
?>