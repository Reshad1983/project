<?php

    mysql_connect("127.0.0.1:3307","reshad","146379re") or die(mysql_error());
    mysql_select_db("bagcompany");

	$result = mysql_query("select model_name, price from bagmodel");
	if (!$result) 
    {
       die(mysql_error());
    }
	while($row = mysql_fetch_assoc($result))
    {
	    $output[] = $row;
    }
    print(json_encode($output));
	mysql_close();
?>	