<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>
<?php session_start();?>
<h1>Admin Dashboard</h1>
<h2>Logged In as: [<?php echo $_SESSION['username']; ?>]</h2>
<h2><a href="logout.php">Log Out</a></h2>
<hr>
<?php if($_SESSION['username'] == 'faculty'){?>
	<form action="resetAll.php" method="POST">
		<input type="submit" value="RESET ALL">
	</form>
<?php }?>
<!-- SEARCH ID NUMBER -->
<form action="search.php" method="POST">
	<input type="text" name="idnumber" placeholder="Search ID Number" autofocus="" required="">
	<input type="submit" value="Search" class="btn">
</form>
<?php include 'include/footer.php'; ?>