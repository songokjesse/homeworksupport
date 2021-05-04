<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\HomeworkFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.Homework.files', compact('homework','homework_id'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'homework_id' => 'required',
            'file' => 'required',
        ]);
        $file = $request->file('file');

        $name = time().rand(1,100).'.'.$file->extension();
                $file->storeAs('files', $name);

                $homeworkUpload = new HomeworkFile;
                $homeworkUpload->homework_id = $request->input('homework_id');
                $homeworkUpload->OriginalName = $request->file('file')->getClientOriginalName();
                $homeworkUpload->fileSize = $request->file('file')->getSize();
                $homeworkUpload->filePath = $name;
                $homeworkUpload->save();

        $homework_id = $request->input('homework_id');
        return redirect()->route('HomeworkUpload', ['id' => $homework_id]);
    }
    public function destroy($id){
        $homework = HomeworkFile::find($id);
        $homework_id = $homework->homework->id;
        $homework->delete();
        Storage::delete('files/'.$homework->filePath);
        return redirect()->route('HomeworkUpload', ['id' => $homework_id]);
    }
}
