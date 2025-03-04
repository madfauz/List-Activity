<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class activityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activites = Activity::orderBy("created_at","desc")->paginate(10);
        return view("activity.index")->with("data_activities", $activites);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("activity.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:activity,name",
            "type" => "required",
            "status"=>"required",
            "time_start"=>"required",
            "time_end"=>"required",
        ],[
            "name.unique"=> "Name already exists",
            "name.required"=> "Name is required",
            "type.required"=> "Type is required",
            "status.required"=> "Status is required",
            "time_start.required"=> "Time start is required",
            "time_end.required"=> "Time end is required",
        ]);

        $data = [
            "name" => $request->name,
            "type" => $request->type,
            "description" => $request->description ?? null,
            "status" => $request->status,
            "time_start" => $request->time_start,
            "time_end" => $request->time_end
        ];

        Activity::create($data);

        return redirect()->route("activity.index")->with("success", "Activity created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_activity = Activity::findOrFail($id);
        return view("activity.edit")->with("data_activity", $data_activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "type" => "required",
            "status"=> "required",
            "time_start"=> "required",
            "time_end"=> "required",
        ],[
            "name.required"=> "Name is required",
            "type.required"=> "Type is required",
            "status.required"=> "Status is required",
            "time_start.required"=> "Time start is required",
            "time_end.required"=> "Time end is required",
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update([
            "name" => $request->name,
            "type" => $request->type,
            "description" => $request->description ?? null,
            "status" => $request->status,
            "time_start"=> $request->time_start,
            "time_end"=> $request->time_end
        ]);

        return redirect()->route("activity.index")->with("success", "Activity updated successfully");
    }

    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->route("activity.index")->with("success", "Activity deleted successfully");
    }
}
