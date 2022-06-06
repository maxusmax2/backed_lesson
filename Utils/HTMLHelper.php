<?php
	//Cтатический класс помогающий работать с html-шаблонами
	class HTMLHelper
	{
		public static function getHeader()
		{
			return <<<Header
			<header class="header__container">
					<nav class="header__nav">
						<ul class="header__list">
							<li class="header__item"> 
								<a href="/index.php" class="header__link">
									Главная
								</a>
							</li>
							<li class="header__item"> 
								<a href="/Games/Games.php" class="header__link">
									Игры
								</a>
							</li>
							<li class="header__item"> 
								<a href="/Films/Films.php" class="header__link"> 
									Фильмы
								</a>
							</li>
						</ul>
					</nav>
				</header>
	Header;
		}

		public static function getArticles(array $Articles):string
		{
			$ArticlesBody = "<main class='main__container'> ";
			for ($i = 0 ; $i < count($Articles);$i++)
			{
				$ArticlesBody .= self::getArticleBody($Articles[$i]);
			}
			$ArticlesBody .= "</main>";

			return $ArticlesBody;
		}

		public static function getArticle(Article $Article):string
		{
			return <<<Article
			<main class="main__container">
				<article class="post__container">
						<h1 class="post__title">{$Article->getTitle()}</h1>
						<ul class="post__date-author">
							<li class="post__author">{$Article->getAuthor()}</li>
							<li class="post__date">{$Article->getDate()}</li>
						</ul>
						<div class="post__text">
							<p class="post__paragraph">{$Article->getContent()}</p>
					</div>
				</article>
			</main>
	Article;
		}


		public static function getCommentMenu(array $comments)
		{
			$commentMenu = <<<Menu
			<section class="comment__container">
					<h2 class="comment__title">Комментарии</h2>
					<form method="POST" class="comment__form">
						<textarea class = "comment__content"  placeholder="Как вам статья?"></textarea>
						<input type = "text" placeholder="Автор" class= "comment__author"><button type="button" class="comment__publish">Отправить</button>
					</form>
					<div class="comment__items">
	Menu;	
			for ($i = 0 ; $i < count($comments);$i++)
			{
				$commentMenu .= self::getCommentCard($comments[$i]);
			}
						
			$commentMenu .="</div> </section";

			return $commentMenu;
		}

		protected function getArticleBody(Article $Article)
		{
			
			return <<<Article
			<article class="main__post">
				<h2 class="main__title"><a href="/getArticle/getArticle.php?id={$Article->getId()}">{$Article->getTitle()} </a></h2>
				<p class="main__annotation"> {$Article->getStartArticle()}</p>
				<div class="main__post-info">
					<ul class="main__date-author">
						<li class="main__author">{$Article->getAuthor()}</li>
						<li class="main__date">{$Article->getDate()}</li>
					</ul>
					<p class="main__watch">{$Article->getViewCount()}</p>
				</div>
			</article>
	Article;
		}

		public static function getCommentCard($comment)
		{
			return <<<Comment
			<div class="comment__item">
				<div class="comment__item-content">
					<p class="comment__item-text">{$comment->content}</p>
				</div>
				<div class="comment__info">
					<p class="comment__item-author">{$comment->author}</p>
					<p class="comment__item-date">{$comment->date}</p>
				</div>
			</div>
	Comment;
		}
	}