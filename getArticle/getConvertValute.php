<?php
	require_once ($_SERVER['DOCUMENT_ROOT']."/Utils/СurrencyConverter.php");
	require_once ($_SERVER['DOCUMENT_ROOT'].'/Exception/LessThanZeroException.php');

	if('POST' == $_SERVER['REQUEST_METHOD'])
	{
		
		$converter = new CurrencyConverter;
		$requestData = json_decode(file_get_contents('php://input'),true);
		$valute = $requestData['valute'];
		$value = $requestData['value'];
		
		try 
		{
			$result = "Вы задонатили проекту ".$converter->convert($valute,$value)." рублей";	
		}
		catch(LessThanZeroException $e)
		{
			$result = $e->getMessage();
		}
		 
		print $result;
	}