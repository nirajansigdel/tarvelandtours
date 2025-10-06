<?php

namespace App\Http\Controllers;

use App\Models\MissionVisionValue;
use Illuminate\Http\Request;

class MissionVisionValueController extends Controller
{
    // Display a listing of the resource
    public function index()
{
    $missionvisionvalues = MissionVisionValue::latest()->paginate(10);
    return view('backend.missionvisionvalue.index', compact('missionvisionvalues'));
}
    // Show the form for creating a new resource
    public function create()
    {
        return view('backend.missionvisionvalue.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        MissionVisionValue::create($request->only('heading', 'description'));

        return redirect()->route('admin.missionvisionvalue.index')->with('success', 'Item created successfully.');
    }

    // Display the specified resource
    public function show(MissionVisionValue $missionvisionvalue)
    {
        return view('backend.missionvisionvalue.show', compact('missionvisionvalue'));
    }

    // Show the form for editing the specified resource
    public function edit(MissionVisionValue $missionvisionvalue)
    {
        return view('backend.missionvisionvalue.edit', compact('missionvisionvalue'));
    }

    // Update the specified resource in storage
    public function update(Request $request, MissionVisionValue $missionvisionvalue)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $missionvisionvalue->update($request->only('heading', 'description'));

        return redirect()->route('admin.missionvisionvalue.index')->with('success', 'Item updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(MissionVisionValue $missionvisionvalue)
    {
        $missionvisionvalue->delete();

        return redirect()->route('admin.missionvisionvalue.index')->with('success', 'Item deleted successfully.');
    }
}
