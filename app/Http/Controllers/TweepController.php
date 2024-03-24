<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TweepController extends Controller
{
    public function handleGoogleSignIn(Request $request)
{
    // Retrieve the token from the request
    $token = $request->input('token');

    // Decode the token to extract information
    $tokenParts = explode('.', $token);
    $tokenPayload = base64_decode($tokenParts[1]);
    $tokenData = json_decode($tokenPayload, true);

    // Extract the "sub" (user ID) and the user's name
    $userId = $tokenData['sub'];
    $userName = $tokenData['name'];

    // Now you can use $userId and $userName as needed
    // For example, you can return them as JSON response
    return view('index', ['userId' => $userId, 'userName' => $userName]);
}

}
