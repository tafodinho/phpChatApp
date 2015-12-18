<!--The main index page which has the 
	chat application and combines everything 
	together here-->
<!DOCTYPE html>
<?php 
	session_start();
	if(!(isset($_SESSION['id']) && $_SESSION['id'] != '')){
		header("location: php/login_form.php");
	} 
?>
<html>
	<head>
		<title>Chat</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="page.css">
		<link rel="stylesheet" href="chat.css">
	</head>
	<body>
		<div class="container" id="chat-container">
			<div class="container" id="sub-chat-container">
				<div class="row" id="row-top">
					<ul class="top">
						<li class="top-text"><?php echo '<img src="'.$_SESSION['picture'].   '" width="37px" style="border-radius: 3px">' ?>  Hi, <span class="name"><?php echo $_SESSION['username']; ;?></span></li>
						<li class="top-text"><a href="php/logout.php" class="button">Logout</a></li>
					</ul>
				</div>
				<div class="row" id="row-center">
					<div class="col-sm-8" id="col-1">
						<div class="msg-display"> 
						
						</div>
					</div>
					<div class="col-sm-4" id="col-2">
						<ul class="list-group">
							<div id="online-users">
								
							</div>
						</ul>
					</div>
				</div>
				<div class="row" id="row-bottom">
					<form class="form-inline" method="POST">
						<div id="form">
							<textarea rows="3" class="col-sm-8 msg-area" name="message" id="message"></textarea> 
							<button class="btn" id="send" name="submit" style="margin-top:5px">Send</button><br>
							<input type="checkbox" name="check"  id="check">
							<span style="font-size:11px">press Enter to send</span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/check.js"></script>
	</body>
</html>
