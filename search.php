<?php session_start();?>
<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>
<h1>Admin Dashboard</h1>
<table>
	<thead>
		<th><?php echo $_SESSION['office_username'];?></th>
	</thead>
<?php
$student_search = $_POST['search_student'];
$admin_id = $_SESSION['office_id'];

$stu_id = "";
$sql = "SELECT * FROM tbl_student WHERE student_username = '$student_search'";
$execSql = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($execSql)){
	$stu_id = $row['id'];
}

$searchStatus = "SELECT * FROM tbl_status WHERE student_id = '$stu_id' AND office_id ='$admin_id'";
$execSearch = mysqli_query($db, $searchStatus);
while($searchRow = mysqli_fetch_array($execSearch)){
?>
	<tbody>
			<td><?php echo $searchRow['status'];?></td>
	</tbody>
</table>
<?php }?>
<a href="admin_dashboard.php"><< Go back</a>
<?php include 'include/footer.php'; ?>
