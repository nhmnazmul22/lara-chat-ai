<?php

namespace App\Http\Controllers;

use App\Ai\Agents\ChatAgent;
use Illuminate\Http\Request;

class AIChatController extends Controller
{
    public function chatWithAI(Request $request)
    {
        $validated = $request->validate([
            'message' => ['string']
        ]);

        $response = (new ChatAgent)->promt($validated['message']);

        return $response->toArray();
    }
}
