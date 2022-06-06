<?php
	// Класс реализует логику валидации формы с комментарием
	class Validator
	{
		public static function validateComment(string $author,string $content):bool
		{
			return self::validateAuthorComment($author) && self::validateContentComment($content);
		}

		protected function validateAuthorComment(string $author):bool
		{
			return isset($author) && strlen($author) > 4;
		}

		protected function validateContentComment(string $content):bool
		{
			return isset($content) && strlen($content) > 3;
		}
	}
