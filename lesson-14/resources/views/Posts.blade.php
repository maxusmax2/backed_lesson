<!DOCTYPE html>
<head>
    <title>Посты</title>
</head>
<body>
    @foreach ($Posts as $key=>$post )
        <h3>{{$post->name}}</h3>
        <a href="/post/{{$post->id}}">{{$post->title}} </a>
        <br>
    @endforeach
</body>
