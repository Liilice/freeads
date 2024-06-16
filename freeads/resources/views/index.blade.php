<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" >
    <title>Freeads</title>
</head>
<body>
    <main class="container_main">
        <h1>Free Ads - Site d'annonce </h1>
        <p>Avec Free Ads, trouvez la bonne affaire sur le site référent de petites annonces de particulier à particulier et de professionnels. Avec des millions de petites annonces, trouvez la bonne occasion!!!</p>
        <img src="{{asset('image/freeAdsLogo.png')}}" alt="logoFreeAds">
        <div class="d_flex_column">
            <button class="btn btn-primary"><a href="./register">Créer un compte</a></button>
            <button class="btn btn-default"><a href="./login">Se connecter</a></button>
        </div>
    </main>
</body>
</html>

