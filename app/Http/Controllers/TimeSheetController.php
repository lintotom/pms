<?php

namespace App\Http\Controllers;

use App\Models\TimeSheet;
use App\Models\Task;
use Illuminate\Http\Request;

class TimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheets = TimeSheet::latest()->paginate(5);
        return view('timesheet.index',compact('timesheets'))->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::where('status','!=','Completed')->get();
        return view('timesheet.create',compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'task_id' => 'required',
            'hour' => 'required|numeric|gt:0',
            'task_date' => 'required|date|date_format:Y-m-d',
            'description' => 'required',

        ]);
        $task = TimeSheet::create([
                'task_id' =>$request->task_id,
                'hour' =>$request->hour,
                'task_date' =>$request->task_date,
                'description' =>$request->description,
        ]);
        return redirect()->route('timesheet.index')
        ->with('success','Time Sheet Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $timesheet)
    {
       
        $tasks = Task::where('status','!=','Completed')->get();
       
        return view('timesheet.edit',compact('timesheet','tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSheet $timesheet)
    {
        $request->validate([
            'task_id' => 'required',
            'hour' => 'required|numeric|gt:0',
            'task_date' => 'required|date|date_format:Y-m-d',
            'description' => 'required',

        ]);
        $timesheet->update([
       
                'task_id' =>$request->task_id,
                'hour' =>$request->hour,
                'task_date' =>$request->task_date,
                'description' =>$request->description,
        ]);
        return redirect()->route('timesheet.index')
        ->with('success','Time Sheet Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSheet $timeSheet)
    {
        $timeSheet->delete();
  
        return redirect()->route('timesheet.index')
                        ->with('success','Time Sheet deleted successfully');
    }
}
