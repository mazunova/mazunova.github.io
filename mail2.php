<?php
//капча
/*require_once __DIR__ . '/recaptcha.php';
$secret = "6Le0338UAAAAACLcOQUbzmfYIqou1KLFTF9Y29dh";
$response = null;
 
$reCaptcha = new ReCaptcha($secret);
	if ($_POST["g-recaptcha-response"]) {
		$response = $reCaptcha->verifyResponse(
		$_SERVER["REMOTE_ADDR"],
		$_POST["g-recaptcha-response"]
	);
}*/
$post = (!empty($_POST)) ? true : false;
if($post) {
	$email = htmlspecialchars(trim($_POST['email']));
	$name = htmlspecialchars(trim($_POST['name']));
	$tel = htmlspecialchars(trim($_POST['tel']));
	$sub = htmlspecialchars(trim($_POST['sub']));
	$brim = htmlspecialchars(trim($_POST['brim']));
	$delivery = htmlspecialchars(trim($_POST['delivery']));
	$message = htmlspecialchars(trim($_POST['message']));
	$links = htmlspecialchars(trim($_POST['links']));
	$error = '';
	if(!$name) {$error .= 'Укажите свое имя. ';}
	if(!$email) {$error .= 'Укажите электронную почту. ';}
	if(!$message || strlen($message) < 1) {$error .= 'Введите сообщение. ';}
	if(!$error) {
		$address = "petric2318@gmail.com";
		$mes = "Почта: ".$email."\n\nИмя: ".$name."\n\nТелефон: " .$tel."\n\n:Размер фотографии: " .$sub."\n\n:Поля: " .$brim."\n\n:Доставка: " .$delivery."\n\nСсылка на фото: ".$links."\n\nСообщение: ".$message."\n\n";
		$send = mail ($address,$mes,"Content-type:text/plain; charset = UTF-8\r\nReply-To:$email\r\nFrom:$name <contact>");
		if($send) {echo 'OK';}
	}
	else {echo '<div class="err">'.$error.'</div>';}
}
?>
