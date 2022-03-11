<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task as Tasks;
class Task extends Controller
{
   public function create()
   {
   	return view('task.create');
   }

   public function store(Request $request)
   {
   	$priorities=['Low'=>'Low','Medium'=>'Medium','High'=>'High','Critical'=>'Critical'];
   	$status=['Pending'=>'Pending','In Progress'=>'In Progress','Complete'=>'Complete'];

   	$this->validate($request, [  
			'name' => 'required|max:100',        
         'due_date' => 'date_format:Y-m-d|required', 
         'priority' => 'required|in:'. implode(',', $priorities),  
         'status' => 'required|in:'. implode(',', $status),
         'desc' => 'nullable|max:200',        
      ], [
        
      ]);

      $task = new Tasks;
      $task->desc=$request->desc;
      $task->priority=$request->priority;
      $task->name=$request->name;
      $task->due_date=$request->due_date;
      $task->status=$request->status;

      $task->save();

      return redirect()->route('dashboard')->with('success', 'Task Created Successfully'); 
   }

   public function edit($task_id)
   {
   	$task=Tasks::findOrFail($task_id);
   	return view('task.edit',compact('task'));
   }

   public function update(Request $request,$task_id)
   {
   	$task=Tasks::findOrFail($task_id);

   	$priorities=['Low'=>'Low','Medium'=>'Medium','High'=>'High','Critical'=>'Critical'];
   	$status=['Pending'=>'Pending','In Progress'=>'In Progress','Complete'=>'Complete'];

   	$this->validate($request, [         
         'due_date' => 'date_format:Y-m-d|required', 
         'priority' => 'required|in:'. implode(',', $priorities),  
         'status' => 'required|in:'. implode(',', $status),
         'desc' => 'nullable|max:200',        
      ], [
        
      ]);

      $task->desc=$request->desc;
      $task->priority=$request->priority;
      $task->due_date=$request->due_date;
      $task->status=$request->status;

      $task->save();

      return redirect()->route('dashboard')->with('success', 'Task Updated Successfully'); 
   }

   public function delete($task_id)
   {
   	$task=Tasks::findOrFail($task_id);
   	$task->delete();
   	return redirect()->route('dashboard')->with('success', 'Task Removed Successfully');
   }
}
