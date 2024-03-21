<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Vue</title>
    <meta name="google-signin-client_id" content="852116997814-lfcrnrnr0h53blov5g6nlanggpp2spmv.apps.googleusercontent.com">
    @vite('resources/scss/app.scss')
    @vite(['resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    
</head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn">here</div>
    <div id="app"></div>
</body>
</html>