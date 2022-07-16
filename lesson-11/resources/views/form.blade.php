<!DOCTYPE html>
<head>
    <title>Создание Поста</title>
</head>
<body>
    <form method="POST" action="">
        @csrf
        <input type="text" name='title'>
        <textarea name='body'></textarea>
        <button type="submit">Опубликовать</button>
    </form>
</body>
