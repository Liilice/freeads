<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{ asset('css/searchAnnonce.css') }}" > -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/showAnnonce.css') }}" >
    <script src="{{ asset('js/burger.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.navigation')
    <form method="post">
        @csrf
        <label for="price">Recherche par prix</label>
        <input style="width: 50rem;" type="range" name="price" min="0" max="10000" value="0" step="20" id="slider"/>
        <p id="value"></p>
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
                    <li>Prix : {{$article->prix}}€</li>
                @php
                    $arrayImage = explode("|",$article->photographie);
                @endphp
                @foreach($arrayImage as $image)
                    <img src="{{URL::to($image)}}" alt="{{$image}}">
                @endforeach
                </ul>
            </div>
            @endforeach   
        @endif
    </div>
    <script>
        document.getElementById('slider').oninput = function (){
            document.getElementById('value').innerText = this.value;
        }
    </script>
</body>
</html>