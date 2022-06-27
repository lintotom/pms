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

<form action="{{ route('task.update',$task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row" style="margin-top: 50px;">
       
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Task Name</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <input type="text" name="name" value="{{ $task->name }}"  class="form-control" placeholder="Name">
            </div>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Project</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <select name="project_id" id="project_id" style="width:100%">
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}"  {{ ($task->project_id == $project->id ? 'selected' :'') }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Status</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <select name="status" id="status" style="width:100%">
                    <option value="Active" {{ ($task->status =="Active" ? 'selected' :'') }}>Active</option>
                    <option value="Pending" {{ ($task->status =="Pending" ? 'selected' :'') }}>Pending</option>
                    <option value="Completed" {{ ($task->status =="Completed" ? 'selected' :'') }}>Completed</option>
                </select>
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
