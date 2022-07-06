<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>lesson-8</title>
	<script src='script.js'></script>
</head>
<body>
	<h3>Место сохранения запроса </h3>
	<select class="download">
		<option value="cookie">Куки</option>
		<option value="session">Сессия</option>
		<option value="local">На сайте</option>
	</select>
	<button type="button" class="download-fake-json">Сделать запрос на  fake api</button>
	<h3>Место загрузки запроса</h3>
	<select class="get">
		<option value="cookie">Куки</option>
		<option value="session">Сессия</option>
		<option value="local">На сайте</option>
	</select>
	<button  type ="button" class="get-fake-json">Вывести сохраненый запрос</button>
	<div class="json"></div>
</body>
</html>