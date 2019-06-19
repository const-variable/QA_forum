<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }

}
