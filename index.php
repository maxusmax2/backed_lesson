<?php
	include "Articles.php";
	
	// Переменная которая содержит HTML-код всех заголовков 
	$headers = "";

	// счетчик индекса статьи в массиве
	$i = 0;

	//наполняет список заголовками статей
	foreach($Articles as $header){
		$headers .= "<li> <a href = getContent.php?content=$i>". $header->header . "</a></li>";
		$i++;
	} 
	//Вывод страницы
	print "
		<html>
		<head>
			<title>Main</title>
		<head>
		<body>
			
			<ul>
			$headers
			</ul>
		</body>
		<html> 
		";
?>
