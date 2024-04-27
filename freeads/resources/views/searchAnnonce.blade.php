<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        @csrf
        <input type="search" name="search" id="search">
    </form>
    @if (isset($result))
        @foreach ($result as $article) 
            <li>{{$article['id']}}</li>  
            <li>{{$article['id_user']}}</li> 
            <li>{{$article['titre']}}</li>
            <li>{{$article['description']}}</li>
            <li>{{$article['prix']}}</li>
            @php
                $arrayImage = explode("|",$article['photographie']);
            @endphp
            @foreach($arrayImage as $image)
                <img src="{{URL::to($image)}}" alt="{{$image}}">
            @endforeach
        @endforeach   
    @endif
</body>
</html>