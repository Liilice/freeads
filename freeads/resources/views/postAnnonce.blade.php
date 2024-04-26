<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="tittle" id="tittle" placeholder="titre">
        <!-- <input type="text" name="image" id="image" placeholder="image"> -->
        <input type="file" name="image[]" multiple>
        <input type="number" name="price" id="price" placeholder="prix">
        <textarea name="content" id="content"  placeholder="description"></textarea>
        <button>Poster</button>
    </form>
    <a href="{{ url('/showAnnonce') }}">Voir les annonces</a>
</body>
</html>