<!DOCTYPE html>
<head></head>
<body>
    <form method="POST" action="/">
        @csrf
        <p>Ваше имя:<input type="text" name ="name"></p>
        <P>Ваша фамилия:<input type="text" name ="family"></p>
        <p>Ваш возраст:<input type="number" name ="age"><br></p>
        <button type="submit">Отправить</button>
        <p style="background-color:red">{{$error}}</p>
    </form>
</body>
