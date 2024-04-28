<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" >
    <script src="{{ asset('js/burger.js') }}"></script>
    <title>Poster un article</title>
</head>
<body>
    @include('layouts.navigation')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <label for="tittle">Quel est le titre de l’annonce ?</label>
        <input type="text" name="tittle" id="tittle" placeholder="Titre">
        <!-- <input type="text" name="image" id="image" placeholder="image"> -->
        <label for="content">Description de l'annonce</label>
        <textarea name="content" id="content"  placeholder="Description"></textarea>
        <label for="price">Votre prix de vente</label>
        <input type="number" name="price" id="price" placeholder="Prix">
        <label for="image">Ajoutez des photos</label>
        <input type="file" name="image[]" multiple>
        <button>Poster</button>
    </form>
    <a href="{{ url('/showAnnonce') }}">Voir les annonces</a>
</body>
</html>