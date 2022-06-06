<?php
	//Класс вмещающий в себя информацию о комментарии
	class comment
	{
		public $author;
		public $date;
		public $content;

		public function __construct (string $author, string $date, string $content)
		{
			$this->author = $author;
			$this->date = $date;
			$this->content = $content;
		}
	}