<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EDITERRRRRRRRRR</h1>
    {{$annonce}}
    <form method="post">
        @csrf
        <input type="text" name="tittle" id="tittle" placeholder="titre" value="{{$annonce->titre}}">
        <input type="text" name="image" id="image" placeholder="image" value="{{$annonce->photographie}}">
        <!-- <input type="file" name="image" id="image"> -->
        <!-- <input type="file" multiple> -->
        <input type="number" name="price" id="price" placeholder="prix" value="{{$annonce->prix}}">
        <textarea name="content" id="content"  placeholder="description">{{$annonce->description}}</textarea>
        <button>Poster</button>
    </form>
</body>
</html>