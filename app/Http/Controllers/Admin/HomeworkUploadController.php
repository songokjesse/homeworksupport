<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\HomeworkFile;
use Illuminate\Http\Request;

class HomeworkUploadController extends Controller
{
    public function index($id)
    {
        //check if $id doesnt Exists
        if(!$id){
            return redirect('admin/homework');
        }
        $homework_id = $id;
        $homework = Homework::find($homework_id)->homework_files;
        return view('admin.Homework.files', compact('homework'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'homework_id' => 'required',
            'filePath' => 'required',
        ]);
        $homework_id = $request->input('homework_id');
        $homeworkUpload = new HomeworkFile;
        $homeworkUpload->homework_id = $request->input('homework_id');
        $homeworkUpload->filePath = $request->input('filePath');
        $homeworkUpload->save();

        return redirect()->route('HomeworkUpload', ['id' => $homework_id]);
    }
}
