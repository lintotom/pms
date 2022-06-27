@extends('layouts.layout')
 
@section('content')
    <div class="row">
        
        <div class="col-lg-12 ">
            <div class="pull-left">
                <h2> Project Report</h2>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" id="search_by_project" name="name"  class="form-control" placeholder="Search By Project">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 ">
                    
                    <a class="btn btn-success" id="search"> Search </a>
                    
                </div>
            </div>

        </div>
    </div>
   
    
    <div class="row" id="content">
            <table class="table table-bordered" id="table_content">
                <thead>
                    <tr>
                    
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Hours</th>
                    
                    </tr>
                </thead>
                <tbody class="tbody">
                    @include('project.table')
                </tbody>
            </table>
    </div>
      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document ).ready(function() {
        $( "#search" ).on("click",  function() {
           
          
                $.ajax({

                    url : "{{url('/search_project')}}",
                    type : 'GET',
                    data : {
                        'search' : $('#search_by_project').val()
                    },
                
                    success : function(data) {     
                      $('#content .tbody').html(data);
                    },
                    error : function(request,error)
                    {
                    
                    }
                });
            
        });
    });
  
</script>