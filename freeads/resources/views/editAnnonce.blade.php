<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" >
    <script src="{{ asset('js/burger.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.navigation')
    <h1>Modifier son annonce</h1>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <label for="tittle">Modifier le titre de l'annonce ?</label>
        <input type="text" name="tittle" id="tittle" placeholder="Titre" value="{{$annonce->titre}}">
        <!-- <input type="text" name="image" id="image" placeholder="image"> -->
        <label for="content">Modifier la description de l'annonce</label>
        <textarea name="content" id="content"  placeholder="Description">{{$annonce->description}}</textarea>
        <label for="price">Modifier le prix de vente</label>
        <input type="number" name="price" id="price" placeholder="Prix" value="{{$annonce->prix}}">
        <label for="image">Modifier les photos</label>
        <input type="file" name="image[]" multiple require> 
        <button>Modifier</button>
    </form>
</body>
</html>