<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::all();
        return response()->json($tweets);
    }

    public function show($id)
    {
        $tweet = Tweet::findOrFail($id);
        return response()->json($tweet);
    }

    public function getTweetsByUserId($userId)
    {
        $tweets = Tweet::where('tweepID', $userId)->get();
        return response()->json($tweets);
    }

    public function store(Request $request)
    {
        $tweet = new Tweet();
        $tweet->title = $request->input('title');
        $tweet->text = $request->input('text');
        $tweet->tweepID = 1; // Set tweepID to 1 as the default user ID
        $tweet->save();
        return response()->json($tweet, 201); // Return the newly created tweet with HTTP status code 201
    }

    public function update(Request $request, $id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->title = $request->input('title');
        $tweet->text = $request->input('text');
        $tweet->save();
        return response()->json($tweet);
    }

    public function destroy($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->delete();
        return response()->json(null, 204); // Return no content with HTTP status code 204
    }
}
