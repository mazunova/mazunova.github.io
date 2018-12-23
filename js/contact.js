jQuery(document).ready(function($) {
	$("#contact").submit(function() {
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "/mail2.php",
			data: str,
			success: function(msg) {
				if(msg == 'OK') {
					result = alert ("Сообщение отправлено");
					$("#fields").hide();
					location.reload();
				}
				else {result = msg;}
				$('#note').html(result);
			}
		});
		return false;
	});
});