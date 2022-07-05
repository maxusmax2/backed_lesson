<html>
	<head>
		<script src='/script.js'></script>
	</head>
	<body>
		<h2>Генерация</h2>
		<span>
			Длина массива:<input type="number" class="lenArr">
			<button class="randArr">Сгенерировать массив</button>
			<p class="printArrRand"></p>
		</span>
		<h2>Сортировка</h2>
		<span>
			<select size = "1" class = "selectedSort">
				<option disabled>Вид Сортировки</option>
				<option value = "buble">Пузырьковая</option>
				<option value = "insert">Вставкой</option>
				<option value = "quick">Быстрая</option>
				<option value = "merge">Слиянием</option>
				<option value = "select">Выбором</option>
			</select>
			<button class="sortArr">Сортировать массив</button>
			<p class="printArrSort"></p>
		</span>
		<h2>Поиск</h2>
		<span>
			Искомый элемент:<input type="number" class="searchableElem">
			<select size = "1" class = "selectedSearch">
				<option disabled>Вид Поиска</option>
				<option value = "line">Линейный</option>
				<option value = "binary">бинарный</option>
				<option value = "indexLine">Индексно-линейный</option>
			</select>
			<button class="searchArr">Поиск</button>
			<p class="printSearchElem"></p>
		</span>
	</body>
</html>