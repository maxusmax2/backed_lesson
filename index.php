<?php
	
	include "ArticlesDBConector.php";
	
	

	if ('GET' == $_SERVER['REQUEST_METHOD'])
	{
		$db_conector = new ArticlesDBConector;

		$Articles = $db_conector->getAllArticles();
		$articles = '';

		//наполняет список заголовками статей
		foreach($Articles as $article)
		{
			$articles .= "<li> <a href = getContent.php?content=".$article['id'].">". $article['title']."</a></li>";
		}
		printRequest($articles);
	}
	
	
	function  printRequest($articles):string
	{
		print <<<HTML
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
HTML
	}
?>

