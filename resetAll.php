<?php
include 'db.php';
session_start();

$updateAll = "UPDATE tbl_records SET osa_status = 'Not Cleared', lib_status = 'Not Cleared' , faculty_status = 'Not Cleared'";
$updateExec = mysqli_query($db, $updateAll);

echo "
	<script>
		alert('SUCCESSFULLY RESET!');
		window.location.href='view.php';
	</script>
";
?>