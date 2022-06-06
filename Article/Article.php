<?php
	//Абстрактный класс который содержит информацию о статье и методы получения информации о статье
	//От него наследуются Классы определяющий вид статьи 
	abstract class Article {

		protected $title;
		protected $content;
		protected $viewCount;
		protected $idArticle;
		protected $author;
		protected $date;

		//Методы реализуемые в дочерних классах и отвечающие за вывод контента и заголовка статьи в зависимости от вида статьи
		abstract public function getContent();
		abstract public function getTitle();


		public function __construct(string $title,string $content,string $author,string $date,int $viewCount,int $idArticle)
		{
			$this->title = $title;
			$this->content = $content;
			$this->viewCount = $viewCount;
			$this->idArticle = $idArticle;
			$this->date = $date;
			$this->author = $author; 
		}


		public function getId():int
		{
			return $this->idArticle;
		}

		public function getViewCount():int
		{
			return $this->viewCount;
		}

		//Метод отдает только часть статьи чтобы отображать еще в карточке статьи
		public function getStartArticle():string
		{
			$max_str_len = 170;

			if(mb_strlen($this->content,'UTF-8') > $max_str_len)
			{
				return mb_substr($this->content,0,$max_str_len,'UTF-8')."...";	
			}
			else
			{
				return $this->content;
			}
		}

		public function getAuthor():string
		{
			return $this->author;
		}

		public function getDate():string
		{
			return $this->date;
		}
	}
?>