<?php
	include "Utils/Searcher.php"; 
	$nanoPerSecond = 1000000000;
	$time = 0.0;
	if('POST' == $_SERVER['REQUEST_METHOD'])
	{
		switch($_POST['search'])
		{
			case "line":
				 
				$startTime = hrtime(true);
				$index = Searcher::lineSearch(json_decode($_POST["notsort"]),$_POST['element']);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) /$nanoPerSecond;
				
				if($index !=-1)
				{
					echo "Индекс Элемента : $index <br> Время Выполнения :$time";
				}
				else
				{
					echo "Элемент не найден  <br> Время Выполнения :$time";
				}
				break;
				
			case "binary":
				
				$startTime = hrtime(true);
				$index = Searcher::binarySearch(json_decode($_POST["sort"]),$_POST['element'],count(json_decode($_POST["notsort"])),0);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) /$nanoPerSecond;
				
				if($index !=-1)
				{
					echo "Индекс Элемента : $index <br> Время Выполнения :$time";
				}
				else
				{
					echo "Элемент не найден  <br> Время Выполнения :$time";
				}
				break;

			case "indexLine":
				$startTime = hrtime(true);
				$index = Searcher::indexLineSearch(json_decode($_POST["sort"]),$_POST['element']);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) /$nanoPerSecond;
				if($index !=-1)
				{
					echo "Индекс Элемента : $index <br> Время Выполнения :$time";
				}
				else
				{
					echo "Элемент не найден  <br> Время Выполнения :$time";
				}
				break;
		}
	}