<!DOCTYPE html>
<head>
    <title>Создание Поста</title>
</head>
<body>
    {{-- {{$namesImage}} --}}
    @foreach ($namesImage as $name )
        <img src="{{asset('storage/'.$name)}}">
        <br>
    @endforeach
</body>
