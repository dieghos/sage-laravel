<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Document;
use App\Http\Requests\FilePost;

class FileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $query = $request->query('q');
    if($query){
      $files = File::where('code','like','%'.$query.'%')
      ->orWhere('description','like','%'.$query.'%')->paginate(5);
    }else{
      $files = File::paginate(5);
    }
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

  public function store(FilePost $request)
  {
        $data = $request->validated();
        $files = File::create($data);
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

  public function update(FilePost $request, File $file){
    $file->update($request->validated());
    if($request->hasFile('filename'))
     {
        foreach($request->filename as $doc)
        {
            $file->assignDocument(
              Document::create([
                'type'=> $doc->getClientOriginalExtension(),
                'path'=> $doc->store('public/docs'),
              ])
            );
        }
     }
     return view('files.show',compact('file'));
  }

  public function status(Request $request){
    $query = $request->query('q');
    if($query){
      $files = File::where('code','like','%'.$query.'%')
      ->orWhere('description','like','%'.$query.'%')->paginate(15);
    }else{
      $files = File::paginate(15);
    }
    $states = ['Ingresado','Trabajando','Para la firma','Finalizado'];
    return view('files.status',compact('files','states'));
  }
}
