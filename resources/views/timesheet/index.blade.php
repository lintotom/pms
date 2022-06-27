@extends('layouts.layout')
 
@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Time Sheet</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('timesheet.create') }}"> Create new </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" id="table_content">
        <tr>
            <th>No</th>
            <th>Project</th>
            <th>Task</th>
            <th>Hour</th>
            <th>Date</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($timesheets as $timesheet)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ @$timesheet->task->project->name}}</td>
            <td>{{ $timesheet->task->name }}</td>
            <td>{{$timesheet->hour }}</td>   
            <td>{{\Carbon\Carbon::parse($timesheet->task_date)->format('d-m-Y') }}</td>   
            <td>{{$timesheet->description }}</td>   
            <td>
                <form action="{{ route('timesheet.destroy',$timesheet->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('timesheet.edit',$timesheet->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>

                  
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $timesheets->links() !!}
      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
    
</script>