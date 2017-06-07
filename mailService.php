<?php
  require_once("PHPMailer/PHPMailerAutoload.php");
  function sendActivateMail($user_id, $user_mail)
	{
		$actual_link = "http://$_SERVER[HTTP_HOST]/announcementSystem/"."activate.php?id=" . $user_id;
		$subject = "User Registration Activation Email";
		$content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
		$mailHeaders = "From: Admin\r\n";
		$mail             = new PHPMailer();
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";
		$mail->Host = gethostbyname('smtp.gmail.com');      // SMTP server
		$mail->Port       = 587;                   // SMTP port
		$mail->Username   = "pankwerty123@gmail.com";  // username
		$mail->Password   = "qwerty123QWERTY123";            // password
		$mail->SetFrom('pankwerty123@gmail.com', 'Activate link');
		$mail->Subject    = $subject;
		$mail->MsgHTML($content);
		$address = $user_mail;
		$mail->AddAddress($address, "Activate link");
		if(!$mail->Send()) {
  			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
  			echo "Message sent!";
		}
	}


 ?>
