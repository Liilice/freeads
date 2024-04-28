<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/showAnnonce.css') }}" >
    <script src="{{ asset('js/burger.js') }}"></script>
    <title>Annonce</title>
</head>
<body>
    @include('layouts.navigation')
    <h1>Toute les annonces</h1>
    <a href="{{ url('/showAnnonce/asc') }}"><button>Trier par les plus récents</button></a>
    <br>
    <div class="parent">
    @foreach ($allArticle as $article) 
        <div class="border">
        <ul>
            <!-- <li>ArticleId : {{$article->id}}</li> -->
            <!-- <li>{{$article->id_user}}</li> -->
            <li>Nom : {{$article->name}}</li>
            <li>Titre : {{$article->titre}}</li>
            <li>Description : {{$article->description}}</li>
            <li>Prix : {{$article->prix}}€</li>
            @php
                $arrayImage = explode("|",$article->photographie);
            @endphp
            @foreach($arrayImage as $image)
                <!-- <img src="{{ asset('image/$image') }}" alt="logo"> -->
                <img src="{{URL::to($image)}}" alt="">
            @endforeach
            <li></li>
            @if ($article->id_user)
                @if ( $article->id_user ==  Auth::user()->id )
                    <a href="{{ route('article.edit', ['id' => $article->id]) }}"><button>modifier</button></a>
                    <a href="{{ route('article.delete', ['id' => $article->id]) }}"><button>supprimer</button></a>
                @endif
            @endif
        </ul>
        </div>
    @endforeach
   </div>
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
                <img src="{{asset($image)}}" alt="{{$image}}">
            @endforeach
        @endforeach   
    @endif
    <a href="{{ url('/dashboard') }}">PAGE ACCUEIL</a>
</body>
</html>