<?php
	
	include "ArticlesDBConector.php";
	//получение информации от бд о статьях
	$db_conector = new ArticlesDBConector;
	$Article = $db_conector->getAllArticles();

	$content = "";
	$commentsHTML = "";
	// Обработка запроса на получения нужной статьи
	if ('GET' == $_SERVER['REQUEST_METHOD'])
	{
		//получение информации от бд о комментариях
		$Comments = $db_conector->getCommentsForArticles($_GET["content"];

		$content .= "<h1>" . $Article[$_GET["content"]]['title'] . "</h1>".$Article[$_GET["content"]]['content'];

		if ($Comments)
		{
			
			$commentsHTML = "<div class = 'comments '> <h2> Ваши комментарии </h2> ";
			//Генерация HTML-кода комментария
			foreach($Comments as $comment_info)
			{
				$commentsHTML .= "
				<div class='comment'>
				<h3>".$comment_info['author']. "</h3>
				<hr>
				<div class= 'comment-body'>".$comment_info['coment_body']."
				</div>
				<hr>
				<p class = 'date-comment'>".$comment_info['date_comment']."</p>
				<p>дата:</p>
				</div>";
			}
			$commentsHTML .= "</div>";
		}

		printRequest($content, $commentsHTML);
	}

	elseif('POST' == $_SERVER['REQUEST_METHOD'])
	{
		$time = date('d.m.Y H:i', time());

		if(formIsValidate())
		{
			$db_conector->addComments($_POST['author'],$_POST['content'],$time,$_POST['id']);
			
			$author = $_POST['author'];
			$content = $_POST['content'];

			print <<<HTMLCOMMENT
			<div class='comment'>
			<h3> $author </h3>
			<hr>
			<div class= 'comment-body'>$content
			</div>
			<hr>
			<p class = 'date-comment'>$time</p>
			<p>дата:</p>
		</div>
HTMLCOMMENT
		}
	}

function formIsValidate()
{
	return isset($_POST['author'])&&isset($_POST['content']))
}

?>

<?php 
function printRequest($content,$commentsHTML):string
{
	print 
		<<<HTMLDOCK
		<html>
		<head>
			<link rel="stylesheet" type="text/css" href="/title-block.css">
			<script type="text/javascript" src="/script.js"></script>
			<title>article</title>
		<head>

		<body>
			<main>
				$content 
			</main>
			<footer>
				$commentsHTML 

				<form method="POST">
					<input  type = "text" placeholder="Автор" class= "author-comment">
					<textarea class = "comment-content">
						
					</textarea>
					<br>
					<button type="button" class="publish-comment">Отправить</button>
				</form>
			</footer>
		</body>
		<html>
HTMLDOCK;
}
?>