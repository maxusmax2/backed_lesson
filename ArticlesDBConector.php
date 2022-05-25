<?php
	include 'Article.php';

	class ArticlesDBConector
	{
		
		public $db;
		public function getAllArticles()
		{
			$db = new PDO('mysql:host = localhost','root','root');
			$q = $db->query("SELECT title,content FROM siteblock.articles;");
			while($row = $q->fetch())
			{
				$request[] = $row;
			}
			return $request;
		}
		public function getCommentsForArticles($id)
		{
			$db = new PDO('mysql:host = localhost','root','root');
			$q = $db->query("SELECT author, coment_body, date_comment  FROM siteblock.comment WHERE id_articles=$id;");
			while($row = $q->fetch())
			{
				$request[] = $row;
			}
			return $request ?? "";
		}

		public function addComments($author,$coment_body,$date_comment,$id_articles)
		{
			try
			{
				$id_articles++;
				$db = new PDO('mysql:host = localhost','root','root');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$q = $db->exec("INSERT INTO siteblock.comment (author, coment_body, date_comment,id_articles)  VALUES('".$author."','".$coment_body."','".
					$date_comment."','".$id_articles."')");
			}
			catch (PDOException $e) 
			{
				print "Couldn't create table: " . $e->getMessage();
			}
			
		}
	} 
?>