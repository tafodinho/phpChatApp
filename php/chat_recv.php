<!--php scripts that selects messages 
	from database and display in the
	chat box according to the users id
 -->

<?php
	session_start();
	include "../core/connect.php";


	$msg_sql = "SELECT * FROM message"; //sql statement to select all messages from message table.
	$msg_result = $conn->query($msg_sql); //php query function to run sql statement.
	/*while loop that selects users 
	according to thier message id's*/
	while($msg_data = $msg_result->fetch_array(MYSQL_ASSOC)){
		$uid = $msg_data['user_id'];
		$user_sql = "SELECT * FROM users WHERE id=$uid";
		$user_result = $conn->query($user_sql);
		$user_data = $user_result->fetch_array(MYSQL_ASSOC);


		$id = $user_data['id'];
		if($id == $_SESSION['id']){
			?><!-- html to display chat in message box  -->
				<div class="container me">
					<div class="says">Me:</div>
					<p><?php echo $msg_data['message'];?></p>
					<div class="time"><?php echo date('jS M, @H:i:sa',strtotime($msg_data['time'])); ?></div>
				</div>
			<?php
		} else{
			?>
				<div  class="container you">
					<div class="says"><?php echo $user_data['username']; ?> says:</div>
					<p><?php echo $msg_data['message'];?></p>
					<div class="time"><?php echo date('jS M, @H:i:sa',strtotime($msg_data['time'])); ?></div>
				</div>
			<?php
		}
	}

?>
