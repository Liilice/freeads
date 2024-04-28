<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" > -->
    <link rel="stylesheet" href="{{ asset('css/searchAnnonce.css') }}" >
    <script src="{{ asset('js/burger.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.navigation')
    <form method="post">
        @csrf
        <label for="search">Rechercher une annonce</label>
        <input type="search" name="search" id="search" placeholder="Rechercher une annonce">
        <button>Rechercher</button>
    </form>
    <br>
    <div class="parent">
        @if (isset($result))
            @foreach ($result as $article)
                <div class="border">
                    <ul>
                        <li>Nom : {{$article->name}}</li> 
                        <li>Titre : {{$article->titre}}</li>
                        <li>Description : {{$article->description}}</li>
                        <!-- <li>{{$article->id}}</li>   -->
                        <li>Prix : {{$article->prix}}€</li>
                    
                    @php
                        $arrayImage = explode("|",$article->photographie);
                    @endphp
                    <!-- <div class="flex-column"> -->
                        @foreach($arrayImage as $image)
                            <img src="{{asset($image)}}" alt="{{$image}}">
                        @endforeach
                    <!-- </div> -->
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
        @endif
</div>
</body>
</html>