<?php

namespace App\Http\Controllers;

use App\Models\kuesioner;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function datadiri()
    {
        return view('pages.datadiri');
    }

    public function pertanyaan($index = 1)
    {
        // Fetch the current question from the database
        $question = kuesioner::find($index);
        $kuesionercount = kuesioner::count();

        // Check if the question exists
        if (!$question) {
            return redirect()->route('feedback'); // Redirect to feedback after last question
        }

        // Pass both question and current question index to the view
        return view('pages.pertanyaan', compact('question', 'index', 'kuesionercount'));
    }
}
