@extends('layouts.layout')   
@section('content')
<div class="row" style="margin-top: 50px;">
    <div class="col-lg-3 margin-tb"></div>
    <div class="col-lg-6 margin-tb">
        <div class="pull-left">
            <h2>Edit Tak </h2>
        </div>
       
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
     
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('timesheet.update',$timesheet->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row" style="margin-top: 50px;">
       
        
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Task</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <select name="task_id" id="task_id" style="width:100%">
                    <option value="">Select Task</option>
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}"  {{ ($timesheet->task_id == $task->id ? 'selected' :'') }}>{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Hours</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <input type="number" name="hour" min="0" value="{{ $timesheet->hour }}"  class="form-control" placeholder="Hour">
            </div>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Date</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <input type="date" name="task_date" value="{{ $timesheet->task_date }}" class="form-control" placeholder="Date">
            </div>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Description</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <input type="text" name="description" value="{{ $timesheet->description }}" class="form-control" placeholder="Description">
            </div>
            
            
        </div>
    </div>
    

    
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
          
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
