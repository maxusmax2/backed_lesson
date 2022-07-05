<?php
	include "Utils/Sorter.php"; 
	if('POST' == $_SERVER['REQUEST_METHOD'])
	{
		$request = [];
		for ($i = 0;$i < $_POST['lenArr'];$i++)
		{
			$request[] = rand(1,1000);
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($request);
	}