<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function index()
    {
        $demands = Demand::latest()->paginate(10);
        return view('backend.demands.index', compact('demands'));
    }

    public function create()
    {
        return view('backend.demands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'transporta' => 'required|string|max:255',
            'date' => 'required|date',
            'demand_types' => 'nullable|array',
            'demand_types.*' => 'string',
            'number_of_people' => 'required|integer|min:1',
            'include' => 'nullable|string',
            'price_rate' => 'required|numeric|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/demands'), $imageName);
            $imagePath = 'uploads/demands/' . $imageName;
        }

        $demandTypes = $request->demand_types ? json_encode($request->demand_types) : null;

        Demand::create([
            'heading' => $request->heading,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $imagePath,
            'transporta' => $request->transporta,
            'date' => $request->date,
            'demand_types' => $demandTypes,
            'number_of_people' => $request->number_of_people,
            'include' => $request->include,
            'price_rate' => $request->price_rate,
        ]);

        return redirect()->route('admin.demands.index')->with('success', 'Demand created successfully.');
    }

    public function edit(Demand $demand)
    {
        $demand->demand_types = $demand->demand_types ? json_decode($demand->demand_types) : [];
        return view('backend.demands.edit', compact('demand'));
    }

    public function update(Request $request, Demand $demand)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'transporta' => 'required|string|max:255',
            'date' => 'required|date',
            'demand_types' => 'nullable|array',
            'demand_types.*' => 'string',
            'number_of_people' => 'required|integer|min:1',
            'include' => 'nullable|string',
            'price_rate' => 'required|numeric|min:0',
        ]);

        $imagePath = $demand->image;

        if ($request->hasFile('image')) {
            if ($demand->image && file_exists(public_path($demand->image))) {
                unlink(public_path($demand->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/demands'), $imageName);
            $imagePath = 'uploads/demands/' . $imageName;
        }

        $demandTypes = $request->demand_types ? json_encode($request->demand_types) : null;

        $demand->update([
            'heading' => $request->heading,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $imagePath,
            'transporta' => $request->transporta,
            'date' => $request->date,
            'demand_types' => $demandTypes,
            'number_of_people' => $request->number_of_people,
            'include' => $request->include,
            'price_rate' => $request->price_rate,
        ]);

        return redirect()->route('admin.demands.index')->with('success', 'Demand updated successfully.');
    }

    public function destroy(Demand $demand)
    {
        if ($demand->image && file_exists(public_path($demand->image))) {
            unlink(public_path($demand->image));
        }

        $demand->delete();

        return redirect()->route('admin.demands.index')->with('success', 'Demand deleted successfully.');
    }
}
