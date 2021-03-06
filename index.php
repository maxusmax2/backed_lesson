<?php
	
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/ArticlesDBConector.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/HTMLHelper.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/Recommender.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Films/FilmArticle.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Games/GameArticle.php");
	//Отдача главной страницы
	if ('GET' == $_SERVER['REQUEST_METHOD'])
	{
		$db = new ArticlesDBConector();

		// представляем сырые данные из БД в объекты классов наследников класса Article
		$data = $db->getAllGameArticles();
		for($i = 0 ; $i < count($data);$i++)
		{	
			
			$Articles[] = new GameArticle($data[$i]['title'],$data[$i]['content'],$data[$i]['authorArticle'],$data[$i]['dateArticle'],$data[$i]['viewCount'],$data[$i]['id']);
		}
		$data = $db->getAllFilmArticles();
		for($i = 0 ; $i < count($data);$i++)
		{	
			
			$Articles[] = new FilmArticle ($data[$i]['title'],$data[$i]['content'],$data[$i]['authorArticle'],$data[$i]['dateArticle'],$data[$i]['viewCount'],$data[$i]['id']);
		}
		
		$recommendationTape = Recommender::getRecommendationFeed($Articles);
		$header = HTMLHelper::getHeader();
		$ArticlesHTML = HTMLHelper::getArticles($recommendationTape);
		print "
			<html>
			<head>
				<link rel='stylesheet' type='text/css' href='/css/style.css'>
				<title>Главная</title>
			</head>
				<body>
					$header
					$ArticlesHTML
				</body>
			</html>";
	}
?>

