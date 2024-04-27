<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Triage par plus récents</h1>
    @foreach ($result as $article) 
        <li>{{$article->id}}</li>
        <li>{{$article->id_user}}</li>  
        <li>{{$article->titre}}</li> 
        <li>{{$article->description}}</li>
        @php
            $arrayImage = explode("|",$article->photographie);
        @endphp
        @foreach($arrayImage as $image)
            <img src="{{URL::to($image)}}" alt="{{$image}}">
        @endforeach
        <li>{{$article->prix}}</li>
        <br>
    @endforeach  
</body>
</html>