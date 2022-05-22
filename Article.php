<?php
	//Класс определяющий структуру статьи
	class Article {
		public $header;
		public $content;

		public function __construct($header,$content)
		{
			$this->header = $header;
			$this->content = $content; 
		}
	}
?>