<?php
	include "Utils/Sorter.php";
	include "Utils/MeasurerTime.php"; 
	if('POST' == $_SERVER['REQUEST_METHOD'])
	{
		$request = [];
		$time = 0.0;
		$nanoPerSecond = 1000000000;
		$notSortArr = json_decode($_POST['arr']);
		switch ($_POST['sort']) {
			case 'buble':
				$startTime = hrtime(true);	

				$request = Sorter::bubbleSort($notSortArr);

				$endTime = hrtime(true);

				$time = ($endTime - $startTime) /$nanoPerSecond;
				break;
			case 'insert':
				$startTime = hrtime(true);	
				$request = Sorter::insertSort($notSortArr);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) /$nanoPerSecond;
				break;
			case 'quick':
				$startTime = hrtime(true);
				$request = Sorter::quickSort($notSortArr);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) /$nanoPerSecond;
				break;
			case 'merge':
				$startTime = hrtime(true);	
				$request = Sorter::mergeSort($notSortArr);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) / $nanoPerSecond;
				break;
			case 'select':
				$startTime = hrtime(true);	
				$request = Sorter::selectSort($notSortArr);
				$endTime = hrtime(true);
				$time = ($endTime - $startTime) / $nanoPerSecond;
				break;
		}
		echo  json_encode([$request,$time]);
		
	}