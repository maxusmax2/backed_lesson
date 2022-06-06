<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/Article/Article.php');

	class ArticlesDBConector
	{
		
		public $db;

		public function __construct()
		{
			$this->db = new PDO('mysql:host = localhost','root','root');
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->executeRequest("use siteblock");
		}

		public function getAllArticles()
		{
			return $this->getResponce("SELECT * FROM siteblock.article");
		}

		public function getAllGameArticles():array
		{
			return $this->getResponce("CALL GetGameArticle();");
		}

		public function getAllFilmArticles():array
		{
			return $this->getResponce("CALL GetFilmArticle();");
		}

		public function getArticle(int $id)
		{

			return $this->getResponce("SELECT * FROM siteblock.article where siteblock.article.id = $id;");
		}

		public function getCommentsForArticles(int $id)
		{
			$responce = $this->getResponce("SELECT *  FROM siteblock.comment WHERE id_article=$id");
			if ($responce)
			{
				return $responce;
			}
			else
			{
				return [];
			};
		}

		public function addComments(string $author,string $comment_body,string $date_comment,$id_article)
		{
			$this->executeRequest("INSERT INTO siteblock.comment (author, body, date_comment,id_article)  VALUES('$author','$comment_body','$date_comment','$id_article');");
		}

		public function updateView(int $id)
		{
			$this->executeRequest("CALL UpdateView($id)");
		}

		protected function getResponce(string $query)
		{
			if($q = $this->db->query($query))
			{
				while($row = $q->fetch())
				{
					$request[] = $row;
				}

				return $request;
			}
			else
			{
				return [];
			}
		}

		

		private function executeRequest(string $query)
		{
			try
			{
				$q = $this->db->exec($query);
			}
			catch (PDOException $e) 
			{
				print "Couldn't insert into table: " . $e->getMessage();
			}
		}
	} 
?>