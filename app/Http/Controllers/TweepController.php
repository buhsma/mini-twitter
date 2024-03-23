<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweepController extends Controller
{
    public function handleGoogleSignIn(Request $request)
    {
        $response = $request->input('response');

        if (isset($response['error'])) {
            // Handle errors (e.g., user cancellation, network issues)
            return response()->json(['error' => $response['error']], 400);
        } else {
            // Access user profile information
            dd($response);
            $accessToken = $response['credential'];

            // Use the access token to retrieve user profile data
            $userData = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://www.googleapis.com/userinfo/v2/me');

            if ($userData->successful()) {
                // Extract the desired user profile information (e.g., name, email)
                $profileData = $userData->json();
                // Use the information as needed (e.g., store in database, return to client)
                return response()->json($profileData);
            } else {
                // Handle errors during profile data retrieval
                return response()->json(['error' => 'Error fetching user profile'], $userData->status());
            }
        }
    }
}
