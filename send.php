<?php
	include('navigation.php');
	if(!empty($_POST)){
		if(isset($_POST)){
			$name = $_POST['name'];
			$message = $_POST['msg'];
			$content = <<<END
			<h3>Message was sent</h3>
			Name: $name
			<br/>
			Message: $message
END;
			$to = "resahm11@student.hh.se";
			$subject = "Test-mail";
			$header = "From".$name;
			mail($to, $subject, $message,$header);
		}
	}
	echo $content;
?>