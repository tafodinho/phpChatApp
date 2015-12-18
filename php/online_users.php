<!--php script that gets every user 
	from ther users table and display
	in the users box -->
<?php
	session_start();
	include "../core/connect.php";//includes connections variables

	$sql = "SELECT * FROM chaters";
	$result = $conn->query($sql);
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		
		?>
			<li class="user-online"><a href="#"><?php echo "<a href=".$row['picture']."><img src=".$row['picture']." width='25px'></a>       "; echo "<a href='#' class='a'>".$row['username']."</a>";?></a></li>
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/check.js"></script>
		<?php
	}
?>

		