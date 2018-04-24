<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TermController extends Controller
{
    public function index(){
      $now = Carbon::now();
      $fromDate = Carbon::now()->addDay(1)->toDateString();
      $tillDate = Carbon::now()->endOfWeek()->toDateString();
      $today = File::whereDate('time_limit',DB::raw('CURDATE()'))->get();
      $week = File::whereBetween('time_limit', [$fromDate, $tillDate] )->get();
      return view('files.term',compact('today','week'));
    }
}
