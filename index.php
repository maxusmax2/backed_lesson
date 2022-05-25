<?php
	
	include "ArticlesDBConector.php";
	
	$db_conector = new ArticlesDBConector;

	
	$Articles = $db_conector->getAllArticles();
	$articles = '';
	//наполняет список заголовками статей
	foreach($Articles as $key=>$article){
	$articles .= "<li> <a href = getContent.php?content=$key>". $article['title']."</a></li>";
	} 
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/title-block.css">
		<title>Main</title>
	<head>

	<body>
	<div class = "titles-content">
		<ul class = "titles">	
			<?php echo $articles ?> 
		</ul>
	</div>
	</body>
<html>