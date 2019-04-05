<?php
include 'db.php';
session_start();

$office_username = $_SESSION['office_username'];
$office_id = $_SESSION['office_id'];
$student_ID = $_GET['id'];

//UPDATE
$updateStatus = "UPDATE tbl_status SET status = 'CLEARED' WHERE student_id ='$student_ID' AND office_id = '$office_id'";
$execUpdate = mysqli_query($db, $updateStatus);

echo "
  <script>
    alert('Successful');
    window.location.href='admin_dashboard.php';
  </script>
";
?>
