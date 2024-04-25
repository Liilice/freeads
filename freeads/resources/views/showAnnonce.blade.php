<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ALL ANNONCE</h1>
    @foreach ($allArticle as $article) 
        <ul>
            <li>ArticleId : {{$article->id}}</li>
            <li>{{$article->id_user}}</li>
            <li>{{$article->name}}</li>
            <li>{{$article->titre}}</li>
            <li>{{$article->description}}</li>
            <li><img src="{{$article->photographie}}" alt="logo"></li>
            <!-- <li>{{$article->photographie}}</li> -->
            <li>{{$article->prix}}</li>
            @if ($article->id_user)
                @if ( $article->id_user ==  Auth::user()->id )
                    <a href="{{ route('article.edit', ['id' => $article->id]) }}"><button>modifier</button></a>
                    <a href="{{ route('article.delete', ['id' => $article->id]) }}"><button>supprimer</button></a>
                @endif
            @endif
        </ul>
    @endforeach    
</body>
</html>