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
    <h1>Plus interressant</h1>
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
                <li></li>
                @if ($article->id_user)
                    @if ( $article->id_user ==  Auth::user()->id )
                        <a href="{{ route('article.edit', ['id' => $article->id]) }}"><button>modifier</button></a>
                        <a href="{{ route('article.delete', ['id' => $article->id]) }}"><button>supprimer</button></a>
                    @endif
                @endif
                <br>
            </ul>
        </div>
        @endforeach  
    </div>
</body>
</html>