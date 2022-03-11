<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task as Tasks;

class Dashboard extends Controller
{
   public function index()
   {
   	$tasks=Tasks::get();
   	
   	return view('dashboard.dashboard',compact('tasks'));
   }

   
}
