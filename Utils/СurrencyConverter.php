<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
	require_once ($_SERVER['DOCUMENT_ROOT'].'/Exception/LessThanZeroException.php');
	class CurrencyConverter
	{
		protected $client;
		/** 
		 * возвращает количество рублей в переданном количестве валюты
		*/
		public function convert(string $valute , float $value):float
		{	
			$this->client = new GuzzleHttp\Client();

			if ($value < 0)
			{
				throw new LessThanZeroException("Указанное вами значение меньше нуля!!!");
			}
			if ($this->client)
			{
				$req = $this->client->request('GET',"https://www.cbr-xml-daily.ru/daily_json.js");
				$result = json_decode($req->getBody(), true);
				$rate = $result['Valute'][$valute]['Value'] / $result['Valute'][$valute]['Nominal'];
			}
			return $rate * $value;
		}
	}
