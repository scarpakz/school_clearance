<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$login_type = $_POST['login_type'];

//Generate query
if($login_type == 'student'){
	$temp_id = "";
	$temp_usr = "";
	$temp_pwd = "";

	$getData = "SELECT * FROM tbl_student WHERE student_username = '$username' AND student_password = '$password'";
	$execGetData = mysqli_query($db, $getData);

	while($row = mysqli_fetch_array($execGetData)){
		$temp_id = $row['id'];
		$temp_usr = $row['student_username'];
		$temp_pwd = $row['student_password'];
	}

	if($temp_usr == ""){
		echo "
			<script>
				alert('Account do not exist!');
				window.location.href='index.php';
			</script>
		";
	}else{

		$_SESSION['student_id'] = $temp_id;
		$_SESSION['student_username'] = $temp_usr;
		$_SESSION['student_password'] = $temp_pwd;

		echo "
			<script>
				window.location.href='student_dashboard.php';
			</script>
		";
	}
}
else if($login_type == 'admin'){
	$temp_id = "";
	$temp_usr = "";
	$temp_pwd = "";

	$getData = "SELECT * FROM tbl_office WHERE office_username = '$username' AND office_password = '$password'";
	$execGetData = mysqli_query($db, $getData);

	while($row = mysqli_fetch_array($execGetData)){
		$temp_id = $row['id'];
		$temp_usr = $row['office_username'];
		$temp_pwd = $row['office_password'];
	}

	if($temp_usr == ""){
		echo "
			<script>
				alert('Account do not exist!');
				window.location.href='index.php';
			</script>
		";
	}else{

		$_SESSION['office_id'] = $temp_id;
		$_SESSION['office_username'] = $temp_usr;
		$_SESSION['office_password'] = $temp_pwd;

		echo "
			<script>
				window.location.href='admin_dashboard.php';
			</script>
		";

	}
}

?>
