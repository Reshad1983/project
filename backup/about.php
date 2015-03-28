<?php
	include('navigator.php');
	$content = <<<END
	<form action="send.php" method="POST">
	<input type="text" name="name" placeholder="Name">
	<br>
	<textarea name="msg" placeholder="Message"></textarea>
	<br>
	<input type="submit" value="Skicka">
	</form>
END;
	echo $content;
	
?>