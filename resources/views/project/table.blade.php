
      @php $i = 0;@endphp
        @foreach ($projects as $project)
            @if(!empty($project->tasks->count()))
              
                @php 
                    $html = '';
                    $total_hour =  0;
                @endphp
                @foreach ($project->tasks as $task_data)
                    @if(!empty($task_data->time_sheets->count()))
                        @php
                            $hour = array_sum(array_column($task_data->time_sheets->toArray(),'hour'));
                            $total_hour += $hour;
                            $html .= '<tr><td></td><td>'.$task_data->name.'</td><td>'.$hour.'</td></tr>';
                        @endphp  
                    @endif
                @endforeach


                <tr bgcolor="#eee">
                    <td >{{ ++$i }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ @$total_hour }}</td>
            
                </tr>
                {!! $html !!}
            @endif
        @endforeach
    
  
  