<?php
	
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/ArticlesDBConector.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/HTMLHelper.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/Recommender.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Films/FilmArticle.php");
	//Отдача страницы с постами про фильмы
	if ('GET' == $_SERVER['REQUEST_METHOD'])
	{
		$db = new ArticlesDBConector();
		
		// представляем сырые данные из БД в объекты классов наследников класса Article
		$data = $db->getAllFilmArticles();
		for($i = 0 ; $i < count($data);$i++)
		{	
			
			$Articles[] = new FilmArticle($data[$i]['title'],$data[$i]['content'],$data[$i]['authorArticle'],$data[$i]['dateArticle'],$data[$i]['viewCount'],$data[$i]['id']);
		}
		$recommendationTape = Recommender::getRecommendationFeed($Articles);
		$header = HTMLHelper::getHeader();
		$Articles = HTMLHelper::getArticles($recommendationTape);
		print "
			<html>
			<head>
				<title>Фильмы</title>
				<link rel='stylesheet' type='text/css' href='/css/style.css'>
			</head>
				<body>
					$header
					$Articles
				</body>
			</html>";
	}
?>