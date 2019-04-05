<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>

<!-- DISPLAY -->
<table border='1px'>
	<thead>
		<th>#</th>
		<th>ID Number</th>
		<th>Full Name</th>
		<th>Course&Year</th>
		<th>Action</th>
	</thead>
	<?php
		// PREPARE TO DISPLAY
		$getData = "SELECT * FROM tbl_student";
		// EXECUTE QUERY
		$executeGetData = mysqli_query($db, $getData);
		// HUTDON NIYA TANAN PAG DISPLAY
		while($row = mysqli_fetch_array($executeGetData)){

	?>
		<tbody>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['idnumber'];?></td>
			<td><?php echo $row['fullname'];?></td>
			<td><?php echo $row['course_year'];?></td>
			<td><a href="deletestudent.php?id=<?php echo $row['id'];?>">Delete</a></td>
		</tbody>
	<?php 
	// GE CLOSE NAKO ANG WHILE
		} 

	?>
</table>
<?php include 'include/footer.php'; ?>