<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{   
    protected $guarded = [];

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function answer(){
        return $this->hasMany(Answer::class);
    }

    public function catagory(){
        return $this->hasOne(Catagory::class,'cat_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addAnswer($answer){

        Answer::create([
            'question_id' => $this->id,
            'description' => $description,
            'user_id'=> Auth::user()->id,
        ]);
    }
        
}
