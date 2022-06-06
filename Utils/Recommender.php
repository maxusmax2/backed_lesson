<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/Article/Article.php');
	//статический класс который отвечают за  ленту рекомендация
	class Recommender
	{
		public static function getRecommendationFeed(array $Articles):array
		{	
			
			$articlesSort = self::sortArticlesByPopularity($Articles);

			return $articlesSort;
		}

		protected function sortArticlesByPopularity(array $Articles):array
		{
			$articlesSort = $Articles; 
			for ($i = 0; $i < count($articlesSort )-1; $i++)
			{
				for ($j = 0; $j < count($articlesSort ) - $i-1; $j++)
				{
					if($articlesSort [$j]->getViewCount() < $articlesSort [$j + 1]->getViewCount())
					{
						$temp = $articlesSort [$j];
						$articlesSort [$j] =  $articlesSort [$j+1];
						$articlesSort [$j+1] = $temp;
					}
				}
			}
			return $articlesSort;
		}
	}