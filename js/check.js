$(document).ready(function () {

	setInterval(function(){
		$('#online-users').load('php/online_users.php');
		$('.msg-display').load('php/chat_recv.php');
	},5000);

	$('#send').click(function(){
		var msg=$('#message').val();
		if(msg!=""){
			$.ajax({
				type:"POST",
				data:{message:msg},
				url:"php/chat_send.php",
				success:function () {
					$('#message').val("");
					$('#col-1').animate({scrollTop:$('#col-1')[0].scrollHeight});
				}
			})
		}
		return false;
	});

	$('#check').click(function(){
		if($('#check').prop('checked')){
			$('#message').keyup(function(e) {
				if (e.keyCode==13) {
					var msg = $('#message').val();
					$.ajax({
						type:"POST",
						data:{message:msg},
						url:"php/chat_send.php",
						success:function (rtn) {
							$('#message').val("");
							$('#col-1').animate({scrollTop:$('#col-1')[0].scrollHeight});
						}
					})
				} return false;
			});
		}
	});

});

