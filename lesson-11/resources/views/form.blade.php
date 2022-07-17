
<!DOCTYPE html>
<head>
    <title>Создание Поста</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <input type="text" name='title'>
        <br>
        <textarea name='body'></textarea>
        <br>
        {{Form::file('photo')}}
        <button type="submit">Опубликовать</button>
    </form>
</body>
