<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Answer;
use App\Question;
class AnswersController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Question $question, $question_id){
        $answer = new Answer();

        // $attributes = request()->validate(['description' => 'required|max:255|min:5']);
        // $question->addAnswer($attributes);
        // dd($question_id);

        $answer->description = request('description');
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $question_id;

        $answer->save();

        // return redirect('/home');
        return redirect()->route('expanded-view', ['question' => $question_id]);

    }

}
