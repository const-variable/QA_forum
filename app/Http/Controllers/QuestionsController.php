<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Question;
use App\Answer;

class QuestionsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function show(Question $question){
        return $question;
        // return view('/expanded-view', ['question'=> $question]);
    }

    public function index(){
        $questions = Question::all();
        return $questions;
        return view('/home', ['questions' => $questions]);
    }

    public function create(){
        return view('questions/create_question');
    }

    public function store(){
        // dd("INSIDE");
        $question = new Question();
        $question->title = request('title');
        $question->description = request('description');
        $question->user_id = (Auth::user()->id); 
        $question->cat_id = request('catagory');

        $question->save();

        return redirect('/home');
    }

    public function deleteQuestion($id){
        $question = Question::find($id)->delete();
    }

    public function vote($type,$question_id){
        $question = Question::find($question_id);
        if($type == 'up_vote'){
            $question->up_votes++;
        } else {
            $question->down_votes++;
        }

        return redirect('/home');
    }
}


