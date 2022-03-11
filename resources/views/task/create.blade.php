@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('scripts')
@include('task.assets.js.create_js')
@endpush


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form  method="POST" name="form-create-task" id="myForm" enctype="multipart/form-data" >
            {{csrf_field()}}
            <div class="col-md-10 offset-md-2">

                <!-- first name -->
                <div class="form-group row m-b-17 {{ $errors->has('first_name') ? 'has-error' : ''}}">
                  <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                  <div class="col-md-7 error-block">
                        {!!Form::text('name',                      
                        null,
                        array(
                            'data-parsley-group'=>'step-member', 
                            'data-parsley-required'=>'true',
                            'data-parsley-required-message'=>'Assignee Name is Required',
                            'data-parsley-trigger'=> 'change focusout',
                            'value' => Input::old('name'),
                            'placeholder'=>'Asignee Name',
                            'class'=>'form-control',
                            'maxlength'=>"100",
                            'onkeypress'=>"return isNumberKey(event)" 
                            )
                        )!!}                        
                    @foreach ($errors->get('name') as $message) 
                      <p class="help-block">{{$message}}</p>
                    @endforeach
                  </div>                  
                </div>
                
            <div class="form-group row m-b-17 {{ $errors->has('due_date') ? 'has-error' : ''}}">
                  <label class="col-md-2 col-form-label">Due Date <span class="text-danger">*</span> </label>
                  <div class="col-md-7 error-block">
                        {!!Form::text('due_date',                      
                        ' ',
                        array(      
                            'data-parsley-group'=>'step-member', 
                            'data-parsley-required'=>'true',
                            'data-parsley-required-message'=>'Due Date is Required',
                            'data-parsley-trigger'=> 'change focusout',                     
                            'value' => Input::old('due_date'),
                            'placeholder'=>'Start Date',
                            'class'=>'form-control datepicker-default',
                            'data-date-format'=>'YYYY-MM-DD',
                            'id'=>'due_date',
                            'data-parsley-no-focus',
                            )
                        )!!}                        
                    @foreach ($errors->get('due_date') as $message) 
                      <p class="help-block">{{$message}}</p>
                    @endforeach
                  </div>                  
               </div>   
              
              <div class="form-group row m-b-17 {{ $errors->has('priority') ? 'has-error' : ''}}">
                  <label class="col-md-2 col-form-label">Priority <span class="text-danger">*</span></label>
                  <div class="col-md-7 error-block">
                        {!!Form::select('priority',
                        ['Low'=>'Low','Medium'=>'Medium','High'=>'High','Critical'=>'Critical'], 
                        null,
                        array(
                            'data-parsley-group'=>'step-member', 
                            'data-parsley-required'=>'true',
                            'data-parsley-required-message'=>'Priority is Required',
                            'data-parsley-trigger'=> 'change focusout',
                            'value' => Input::old('priority'),
                            'class'=>'form-control selectpicker',
                            'data-size'=>'10',
                            'id'=>'priority',
                            'data-live-search'=>'true',
                            'data-style'=>'btn-white',
                            'tabindex'=>'-98',
                            'placeholder'=>'--Select Priority--',
                            'data-parsley-no-focus'
                            )
                        )!!}                        
                    @foreach ($errors->get('priority') as $message) 
                      <p class="help-block">{{$message}}</p>
                    @endforeach
                  </div>                  
               </div>

                <div class="form-group row m-b-17 {{ $errors->has('status') ? 'has-error' : ''}}">
                  <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                  <div class="col-md-7 error-block">
                        {!!Form::select('status',
                        ['Pending'=>'Pending','In Progress'=>'In Progress','Complete'=>'Complete'], 
                        null,
                        array(
                            'data-parsley-group'=>'step-member', 
                            'data-parsley-required'=>'true',
                            'data-parsley-required-message'=>'Status is Required',
                            'data-parsley-trigger'=> 'change focusout',
                            'value' => Input::old('Status'),
                            'class'=>'form-control selectpicker',
                            'data-size'=>'10',
                            'id'=>'Status',
                            'data-live-search'=>'true',
                            'data-style'=>'btn-white',
                            'tabindex'=>'-98',
                            'placeholder'=>'--Select Status--',
                            'data-parsley-no-focus'
                            )
                        )!!}                        
                    @foreach ($errors->get('status') as $message) 
                      <p class="help-block">{{$message}}</p>
                    @endforeach
                  </div>                  
               </div>

               <div class="form-group row m-b-17 {{ $errors->has('desc') ? 'has-error' : ''}}">
                  <label class="col-md-2 col-form-label">Description <span class="text-danger">*</span></label>
                  <div class="col-md-7 error-block">
                      {!!Form::textarea('desc',                      
                        null,
                        array(      
                            'data-parsley-group'=>'step-service', 
                            'data-parsley-trigger'=> 'change focusout',                                             
                            'value' => Input::old('desc'),
                            'rows' =>'5',
                            'class'=>'form-control',
                            'maxlength'=>"200" 
                            )
                        )!!}               
                    @foreach ($errors->get('desc') as $message) 
                      <p class="help-block">{{$message}}</p>
                    @endforeach
                    <div id="the-count">
                        <span id="current">0</span>
                        <span id="maximum">/ 200</span>
                      </div>
                  </div>                  
               </div>


            </div>
            <center>
                    <button type="submit" class="btn btn-primary submit" id="submit" style="width:15em">Add Task</button>     
            </center>
            </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

