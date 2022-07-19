<!DOCTYPE html>
<head>
    <title>Посты</title>
</head>
<body>
    @foreach ($Posts as $key=>$post )
        <a href="/post/{{$post->title}}">{{$post->title}}</a>
        <br>
    @endforeach
</body>
