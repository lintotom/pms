@extends('layouts.layout')
 
@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Project List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('project.create') }}"> Create new </a>
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
            <th>Name</th>
            <th>Status</th>
            
          
            <th width="250px">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->status }}</td>
            
     
            <td>
                <form action="{{ route('project.destroy',$project->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('project.edit',$project->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>

                  
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $projects->links() !!}
      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
    
</script>