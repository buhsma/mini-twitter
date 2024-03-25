<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Vue</title>
    
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    
</head>
<body>
    @if (!session()->has('userId') || !session()->has('userName'))
        <script src="https://accounts.google.com/gsi/client" async defer></script>
    @endif
    <div id="g_id_onload"
     data-client_id="852116997814-lfcrnrnr0h53blov5g6nlanggpp2spmv.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="popup"
     data-login_uri="https://ynotx.ch/api/google-sign-in"
     data-nonce=""
     data-auto_prompt="false">
</div>
<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="filled_black"
     data-text="continue_with"
     data-size="large"
     data-logo_alignment="left">
</div>

    
<div id="app">
</div>

</body>
</html>
