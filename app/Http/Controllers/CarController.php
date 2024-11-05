<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Get the search query from the request
    $search = $request->get('search');
    
    // Check if a search query is present
    if ($search) {
        // If search is provided, filter cars by model, type, or year
        $cars = Car::where('model', 'like', "%{$search}%")
            ->orWhere('type', 'like', "%{$search}%")
            ->orWhere('year', 'like', "%{$search}%")
            ->get();
    } else {
        // If no search query, get all cars
        $cars = Car::all();
    }

    // Pass the cars data to the view
    return view('cars.index', compact('cars'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'type' => 'required|max:100',
            'year' => 'required|integer',
            'image_url' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
        ]);
        
        if($request->hasFile('image_url')){

            $image_urlName = time().'.'.$request->image_url->extension();
            $request->image_url->move(public_path('images/cars'), $image_urlName);
        }

        Car::create([
            'model' => $request->model,
            'type' => $request->type,
            'year' => $request->year,
            'image_url' => $image_urlName,
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return to_route('cars.index')->with('success', 'Car created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validatedData  = $request->validate([
            'model' => 'required',
            'type' => 'required|max:100',
            'year' => 'required|integer',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:2048',
        ]);

        $data = $request->only(['model', 'type', 'year']);

        if ($request->hasFile('image_url')) {
            if ($car->image_url && file_exists(public_path($car->image_url))) {
                unlink(public_path($car->image_url));
            }

            $image_url = time() . '.' . $request->file('image_url')->extension();
            $request->file('image_url')->move(public_path('images/cars'), $image_url);
            $data['image_url'] = $image_url;
        }
        $car->update($data);
 
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
   
       
        return redirect()->route('cars.index')->with('success', 'car deleted successfully');
        // Redirect with a success messag
    }
}
