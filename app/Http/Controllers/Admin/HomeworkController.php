<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Homework;
use App\Models\HomeworkFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homework = Homework::paginate(20);
        return view('admin.Homework.index', compact('homework'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.Homework.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $homework = new Homework;
        $homework->category_id = $request->input('category_id');
        $homework->name = $request->input('name');
        $homework->description = $request->input('description');
        $homework->save();
        $homework_id = $homework->id;
        return redirect()->route('HomeworkUpload', ['id' => $homework_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homework = Homework::find($id);
        $category = Category::all();
        return view('admin.Homework.edit', compact('homework','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $homework = Homework::find($id);
        $homework->category_id = $request->input('category_id');
        $homework->name = $request->input('name');
        $homework->description = $request->input('description');
        $homework->save();

        return redirect()->route('homework.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeworkFiles = DB::table('homework_files')->where('homework_id', $id)->get();

        foreach($homeworkFiles as $file){
            Storage::delete('files/'.$file->filePath);
        }

        $homework = Homework::find($id);
        $homework->delete();

        return redirect()->route('homework.index');
    }
}
