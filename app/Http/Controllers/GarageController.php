<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garages = Garage::all();
        return view('garages.index', compact('garages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('garages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'address' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048', // Image file required with specific types and max size
        ]);

        // Check if an image file is provided
        if($request->hasFile('image')){
            // Generate a unique file name and store the image in 'public/images/cars'
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/garages'), $imageName);
        }

        // Create a new car record in the database with validated data
        Garage::create([
            'name' => $request->name,
            'address' => $request->address,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the Garage listing page with a success message
        return to_route('garages.index')->with('success', 'Garage created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Garage $garage)
    {
        return view('garages.show')->with('garage', $garage);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garage $garage)
    {
        return view('garages.edit', compact('garage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garage $garage)
    {
        // Validate the incoming request data
        $validatedData  = $request->validate([
            'name' => 'required',
            'address' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:2048', // Image optional for update
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garage $garage)
    {
        // Delete the car record from the database
        $garage->delete();

        // Redirect to the cars listing with a success message
        return redirect()->route('garages.index')->with('success', 'Garage deleted successfully');
    }
}
