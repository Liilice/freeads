<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/showAnnonce.css') }}" >
    <script src="{{ asset('js/burger.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.navigation')
    <h1>Triage par plus récents</h1>
    <div class="parent">
    @foreach ($result as $article) 
        <div class="border">
            <ul>
                <li>Nom : {{$article->name}}</li>  
                <li>Titre : {{$article->titre}}</li> 
                <li>Description : {{$article->description}}</li>
                <li>Prix : {{$article->prix}}</li>
                @php
                    $arrayImage = explode("|",$article->photographie);
                @endphp
                @foreach($arrayImage as $image)
                    <img src="{{asset($image)}}" alt="{{$image}}">
                @endforeach
                <br>
            </ul>
        </div>
    @endforeach  
    </div>
</body>
</html>