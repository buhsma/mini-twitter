<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TweepController extends Controller
{
    public function handleGoogleSignIn(Request $request)
{
    // Retrieve the token from the request
    $token = $request->input('credential');
    
    // Decode the token to extract information
    $tokenParts = explode('.', $token);
    $tokenPayload = base64_decode($tokenParts[1]);
    $tokenData = json_decode($tokenPayload, true);

    // Extract the "sub" (user ID) and the user's name
    $userId = $tokenData['sub'];
    $userName = $tokenData['name'];
    dd($userName);
    return redirect('https://ynotx.ch')->with('userId', $userId)->with('userName', $userName);

}

}
