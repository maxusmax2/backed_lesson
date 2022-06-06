<?php
	
	require_once ($_SERVER['DOCUMENT_ROOT']."/Article/Article.php");
	class GameArticle extends Article 
	{
		public function __construct(string $title,string $content,string $author,string $date,int $viewCount,int $idArticle)
		{
			parent::__construct($title,$content,$author,$date,$viewCount,$idArticle);
		}

		public function getTitle()
		{
			return "Обзор на игру : $this->title";
		}
		public function getContent()
		{
			return $this->content;
		}
	}