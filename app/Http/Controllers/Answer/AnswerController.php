<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function show($id){
        $homework = Homework::find($id);
        return view('client.showAnswer', compact('homework'));
    }
}
