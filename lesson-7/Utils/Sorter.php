<?php
	class Sorter 
	{
		public static function printArray(array $sortArr):string
		{
			$arrForPrint = "";
			foreach($sortArr as $element)
			{
				$arrForPrint .= $element . ', ';
			}
			$arrForPrint .= "<br>";
			return $arrForPrint;
		}
		public static function bubbleSort(array $notSortArr):array
		{
			$sortingArr = $notSortArr; 
			for ($i = 0; $i < count($sortingArr)-1; $i++)
			{
				for ($j = 0; $j < count($sortingArr)-$i-1; $j++)
				{
					if($sortingArr[$j] > $sortingArr[$j + 1])
					{
						$temp = $sortingArr[$j];
						$sortingArr[$j] =  $sortingArr[$j+1];
						$sortingArr[$j+1] = $temp;
					}
				}
			}
			return $sortingArr ;
		}

		public static function insertSort(array $notSortArr):array
		{
			$sortingArr = $notSortArr;
			$sortedArr  = [];
			for ($i = 0; $i < count($sortingArr); $i++)
			{
				$sortedArr[] = $sortingArr[$i]; 
				for ($j = count($sortedArr) -1 ; $j >  0; $j--)
				{
					if($sortedArr[$j-1] > $sortedArr[$j])
					{
						$temp = $sortedArr[$j-1];
						$sortedArr[$j-1] = $sortedArr[$j];
						$sortedArr[$j] = $temp;
						continue;
					}
					break;
				}
			}
			return $sortedArr;
		}

		public static function quickSort(array $notSortArr):array
		{
			if(count($notSortArr) <= 1)
			{
				return $notSortArr;
			}
			else
			{
				$referenceElement = $notSortArr[0];
				$less = [];
				$more = [];
				for ($i = 1; $i < count($notSortArr); $i++)
				{
					if($notSortArr[$i] > $referenceElement)
					{
						$less[] = $notSortArr[$i]; 
					}
					else
					{
						$more[] = $notSortArr[$i];	
					}
				}
				return array_merge(self::quickSort($more),[$referenceElement],self::quickSort($less));
			}
			
		}

		public static function mergeSort(array $notSortArr):array
		{
			if(count($notSortArr)==2)
			{
				return self::merge([$notSortArr[0]], [$notSortArr[1]]);
			}
			elseif(count($notSortArr)<=1)
			{
				return $notSortArr;
			}
			else
			{
				$left = self::mergeSort(array_slice($notSortArr,0,intval(count($notSortArr)/2)));
				$right = self::mergeSort(array_slice($notSortArr,intval(count($notSortArr)/2)));
				return self::merge($left,$right);
			}
		}
		public static function selectSort(array $notSortArr):array
		{
			for ($i = 0 ;$i < count($notSortArr);$i++)
			{
				$maxIndex = self::minElement(array_slice($notSortArr,$i))+$i; 
				$temp = $notSortArr[$i];
				$notSortArr[$i] = $notSortArr[$maxIndex];
				$notSortArr[$maxIndex] = $temp;
			}
			return $notSortArr;	
		}

		protected static function minElement(array $notSortArr):int
		{	
			$min = $notSortArr[0];
			$minIndex = 0;
			for ($i = 1 ; $i < count($notSortArr);$i++)
			{
				if($notSortArr[$i] < $min)
				{
					$min = $notSortArr[$i];
					$minIndex = $i;
				}
			}
			return $minIndex;
		}


		protected static function merge(array $arr1,array $arr2):array
		{
			$sortArr = [];
			$itr1 = 0;
			$itr2 = 0;
			while(1)
			{
				if(count($arr1) <= $itr1)
				{
					$sortArr = array_merge($sortArr,array_slice($arr2,$itr2));
					
					break;
				}
				elseif(count($arr2) <= $itr2)
				{
					$sortArr = array_merge($sortArr,array_slice($arr1,$itr1));
					
					break;
				}
				else
				{
					if($arr1[$itr1]<$arr2[$itr2])
					{
						$sortArr[] = $arr1[$itr1];
						$itr1++;
					}
					else
					{
						$sortArr[] = $arr2[$itr2];
						$itr2++;
					}
				}
				
			}
			return $sortArr; 
		}
	}