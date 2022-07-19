
<!DOCTYPE html>
<head>
    <title>Создание Поста</title>
</head>
<body>
    <form method="POST" action="/createPost" >
        @csrf
        <input type="text" name='title'>
        <br>
        <textarea name='body'></textarea>
        <br>
        <button type="submit">Опубликовать</button>
    </form>
</body>
