<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ScoreController extends Controller
{
    public function index()
    {
        return view('scores.index');
    }

    public function check(Request $request)
    {
        $validated = $request->validate([
            'sbd' => 'required|integer',
        ]);

        $score = Score::where('sbd', $validated['sbd'])->first();

        if (!$score) {
            return back()
                ->withErrors(['sbd' => 'Registration number not found'])
                ->withInput();
        }

        return view('scores.index', compact('score'));
    }
}
