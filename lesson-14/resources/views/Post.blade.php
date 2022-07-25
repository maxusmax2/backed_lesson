
<!DOCTYPE html>
<head>
    <title> Пост{{$title}}</title>
</head>
<body>

    <h1>{{$title}}</h1>
    <h2>{{$userName}}</h2>
    <p>{{$body}}</p>
    <hr>
    <h2>Комментарии</h2>
    <h3>Написать комментарий</h3>
    <form method="POST" action="/createComment">
        @csrf
        <input name="post_id" type="hidden" value="{{$id}}">
        <input name="name">
        <textarea name="body" cols="30" rows="10"></textarea>
        <button type="submit">Отправить</button>

    </form>
    @foreach ($Comment as $key=>$comment )
    <h3>{{$comment->name}}</h3>
    <p>{{$comment->body}}</p>
    <br>
    @endforeach
</body>
