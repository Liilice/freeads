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
        <input style="width: 50rem;" type="range" name="price" min="0" max="10000" value="0" step="20" id="slider"/>
        <p id="value"></p>
        <button>Rechercher</button>
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
    <script>
        document.getElementById('slider').oninput = function (){
            document.getElementById('value').innerText = this.value;
        }
    </script>
</body>
</html>