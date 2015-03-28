<?php
	if(isset($_POST)){
		if(!empty($_POST)){
			$content = <<<END
				Name: {$_POST['name']}
				<br>
				Message: {$_POST['msg']}
END;
		}
	}
	echo $content;

?>