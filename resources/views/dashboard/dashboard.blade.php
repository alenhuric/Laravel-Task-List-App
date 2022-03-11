@push('scripts')
@include('dashboard.assets.js.js')
@endpush
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::has('success'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                    @endif
                     <table id="members" class="table table-bordered table-striped" width="100%">
                        <thead>
                        <tr>         
                           <th style="white-space: nowrap;" data-priority="2">Task ID</th>
                           <th style="white-space: nowrap;" data-priority="3">Name</th> 
                           <th style="white-space: nowrap;" data-priority="4">Due Date</th> 
                           <th style="white-space: nowrap;" data-priority="5">Priority</th>   
                           <th style="white-space: nowrap;" data-priority="6">Status</th>    
                           <th style="white-space: nowrap;">Description</th> 
                           <th style="white-space: nowrap;" data-priority="7">Created At</th> 
                           <th style="white-space: nowrap;" data-priority="8">Updated At</th>    
                           <th style="white-space: nowrap;" class="no-sort notexport" data-priority="1"></th>                    
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($tasks as $key=> $task)
                              <tr>
                                 <td style="white-space: nowrap;">{{$task->task_id}}</td>
                                 <td>{{$task->name}}</td>
                                 <td>{{$task->due_date}}</td>
                                 <td>{{$task->priority}}</td>
                                 <td>{{$task->status}}</td>
                                 <td>{{$task->desc}}</td>
                                 <td>{{$task->created_at}}</td>
                                 <td>{{$task->updated_at}}</td>
                                 <td>
                                    
                                    <form  method="POST" action="{{url('task/delete/'.$task->task_id)}}" name="form-create-task" id="myForm" enctype="multipart/form-data" >
                                        {{csrf_field()}}
                                        @method("DELETE")
                                        <a href="{{url('task/edit/'.$task->task_id)}}" class="btn btn-xs btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                    </form>
                                 </td>
                              </tr>
                           @endforeach           
                        </tbody>
                      
                     </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
