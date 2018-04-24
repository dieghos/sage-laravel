<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\File;
use App\User;
use App\Mail\JobCreated;
use App\Job;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $files = File::where('state','!=', 'Finalizado')->get();
      return view('jobs.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $users = User::where('apellido','!=', 'SAGE')->get();
      $query = $request->query('q');

      if($query){
        $files = File::where('state','!=','Finalizado')
          ->where('description','LIKE','%'.$query.'%')
          ->orWhere('code','LIKE','%'.$query.'%')->paginate(10);
      }else{
        $files = File::where('state','!=','Finalizado')->paginate(10);
      }
      return view('jobs.create',compact('files','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = User::findOrFail($request->user);
      $file = File::findOrFail($request->file);
      $url = $request->url;
      $user->assignFile($file);
      Mail::to($user)->send(new JobCreated($url));
      return redirect('/jobs');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
