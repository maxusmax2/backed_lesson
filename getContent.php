<?php
	include "Articles.php";
	
	// Обработка запроса на получения нужной статьи
	if ('GET' == $_SERVER['REQUEST_METHOD']){

		print "<h1>" . $Articles[$_GET["content"]]->header . "</h1>"; 
		print $Articles[$_GET["content"]]->content;
	}
?>