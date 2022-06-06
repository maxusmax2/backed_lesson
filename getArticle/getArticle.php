<?php 
	
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/ArticlesDBConector.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/HTMLHelper.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/Validator.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Films/FilmArticle.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Games/GameArticle.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/Comment/Comment.php");

	$db_connector = new ArticlesDBConector;

	if('GET' == $_SERVER['REQUEST_METHOD'])
	{
		$idArticle = $_GET['id'];
		
		$db_connector->updateView($idArticle);

		$data = $db_connector->getArticle($idArticle)[0];

		if($data['typeArticle'] == 'Game')
		{
			$article = new GameArticle($data['title'],$data['content'],$data['authorArticle'],$data['dateArticle'],$data['viewCount'],$data['id']);
		}
		else if ($data['typeArticle'] == "Film")
		{
			$article = new FilmArticle($data['title'],$data['content'],$data['authorArticle'],$data['dateArticle'],$data['viewCount'],$data['id']);
		}
		else 
		{
			print "SERVER ERROR!!!";
			return 0;
		}

		$dataComments = $db_connector->getCommentsForArticles($idArticle);
		for ($i = 0; $i < count($dataComments); $i++)
		{
			$comments[] =  new Comment($dataComments[$i]['author'],$dataComments[$i]['date_comment'],$dataComments[$i]['body']);
		}

	
		$header = HTMLHelper::getHeader();
		$articleHTML = HTMLHelper::getArticle($article);
		$commentMenuHTML = HTMLHelper::getCommentMenu($comments ?? []);

		print <<< HTMLResponce
		<html>

		<head>
			<title>Статья</title>
			<script src='/js/script.js'></script>
			<link rel='stylesheet' type='text/css' href='/css/style2.css'>
		</head>

		<body>
			$header
			$articleHTML
			$commentMenuHTML
		</body>

		</html>
HTMLResponce;

	}

	else if('POST' == $_SERVER['REQUEST_METHOD'])
	{
		$time = date('d.m.Y H:i', time());

		$author = $_POST['author'];
		$content = $_POST['content'];

		if(Validator::validateComment($author, $content))
		{

			$db_connector->addComments($author,$content,$time,$_POST['id']);
			
			$comment = new Comment($author, $time, $content );
	
			print HTMLHelper::getCommentCard($comment);
			
		}
	}