<?php
include 'db.php';

// GIKAN SA HTML NGA DELETE NGA BUTTON
$id = $_GET['id'];

// SETUP
$deleteQuery = "DELETE FROM tbl_student WHERE id = '$id'";

//execute
$deleteData = mysqli_query($db, $deleteQuery);

echo "
	<script>
	alert('Successfully Deleted!');
	window.location.href='about.php'
	</script>
";
?>