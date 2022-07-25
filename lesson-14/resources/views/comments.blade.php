<!DOCTYPE html>
<head>
    <title>Комменты</title>
</head>
<body>
@foreach ($Comments as $key=>$comment )
{{$key}}
<h3>{{$comment->name}}</h3>
<p>{{$comment->body}}</p>
<br>
@endforeach
</body>
