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
      $fromDate = $now->subDay()->startOfWeek();
      $tillDate = $fromDate->addWeek(1);
      $today = File::whereDate('time_limit',DB::raw('CURDATE()'))->get();
      $week = File::whereBetween('time_limit', [$fromDate, $tillDate] )->get();
      return view('files.term',compact('today','week'));
    }
}
