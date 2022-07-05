<?php
	include("Sorter.php");
	class Searcher
	{
		public static function lineSearch(array $searchArr, int $searchElement)
		{
			foreach ($searchArr as $key=>$value)
			{
				if ($value ==$searchElement)
				{
					return $key;
				}
			}
			return -1;
		}
		public static function binarySearch(array $searchArr, int $searchElement):int
		{
			$lenArr = count($searchArr);
			$centerElementIndex = intval(($lenArr) /2);
			$offset = round($centerElementIndex/2);
			while($offset > 0)
			{
				
				if($searchArr[$centerElementIndex]>$searchElement)
				{
					$centerElementIndex-=$offset;
				}
				elseif($searchArr[$centerElementIndex]<$searchElement)
				{
					$centerElementIndex+=$offset;
				}
				else
				{
					return $centerElementIndex;
				}
				$offset = round($offset/2);
			}
			return -1;
		}

		public static function indexLineSearch(array $searchArr, int $searchElement):int
		{
			$indexTable = self::createIndexTable($searchArr, 8);
			$indexTableSize = count($indexTable);
			for ($i = 0 ; $i < $indexTableSize; $i++)
			{	
				
				if ($indexTable[$i]['value'] > $searchElement )
				{
					break;
				}
			}
			
			$currentIndexTableSector = $i? $i-1: $i;
			if ($currentIndexTableSector == $indexTableSize-1)
			{
				for ($j = $indexTable[$indexTableSize-1]['index']; $j < count($searchArr) ;$j++)
				{
					if($searchArr[$j] == $searchElement)
					{
						return $j;
					}
				}
			}
			else
			{
				for ($j = $indexTable[$currentIndexTableSector]['index']; $j < $indexTable[$currentIndexTableSector + 1]['index'] ;$j++)
				{
					if($searchArr[$j] == $searchElement)
					{
						return $j;
					}
				}
			}
			return -1 ;
		}

		protected static function createIndexTable (array $currentArr, int $partitionKey):array
		{
			$indexTable = [];
			$currentArrSize = count($currentArr);
			for ($i = 0; $i < $currentArrSize -1 ; $i+=$partitionKey)
			{
				$indexTable[] = ['index'=>$i,'value'=>$currentArr[$i]];
			}
			return $indexTable;
		}
	}
	