<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Document;

class FileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $files = File::paginate(10);
    return view('files.index',compact('files'));
  }

  public function show(File $file)
  {
    return view('files.show',compact('file'));
  }

  public function edit(File $file)
  {
    return view('files.edit',compact('file'));
  }

  public function create()
  {
    return view('files.create');
  }

  public function store(Request $request)
  {
        $files = File::create($request->all());
        if($request->hasFile('filename'))
         {
            foreach($request->filename as $file)
            {
                $files->assignDocument(
                  Document::create([
                    'type'=> $file->getClientOriginalExtension(),
                    'path'=> $file->store('public/docs'),
                  ])
                );
            }
         }
         return redirect('/files');
  }

}
