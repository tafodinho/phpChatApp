<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				width: 100%;
				border-collapse: collapse;
			}

			table, td, th {
				border: 1px solid black;
				padding: 5px;
			}

			th {text-align: left;}
		</style>
	</head>
	<body>
		<?php
	$q = $_GET['q'];
	$conn = new mysqli("localhost", "root", "Hacker@101", "forum");
	if($conn->connect_error)
	{
		echo "error connecting to server";
	}
	
	$sql = "SELECT * FROM post_table WHERE title = '$q';";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		echo "
			<table>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Post</th>
				</tr>";
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['title'] . "</td>";
				echo "<td>" . $row['content'] . "</td>";
				echo "</tr>";
			}
			
		echo "</table>";
	}
	else
	{
		echo "Waiting....";
	}
	$conn->close();
?>

	</body>
</html>
