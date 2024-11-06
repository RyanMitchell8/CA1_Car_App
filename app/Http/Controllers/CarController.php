<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     * This method retrieves and displays a list of cars.
     * If a search query is present, it filters cars by model, type, or year.
     */
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->get('search');
        
        // Check if a search query is present
        if ($search) {
            // Filter cars by model, type, or year if a search query is provided
            $cars = Car::where('model', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%")
                ->orWhere('year', 'like', "%{$search}%")
                ->get();
        } else {
            // If no search query, retrieve all cars
            $cars = Car::all();
        }

        // Pass the retrieved cars data to the 'cars.index' view
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     * Displays the form where users can input details to add a new car.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     * This method validates the request, stores the car details and its image.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'model' => 'required',
            'type' => 'required|max:100',
            'year' => 'required|integer',
            'image_url' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048', // Image file required with specific types and max size
        ]);

        // Check if an image file is provided
        if($request->hasFile('image_url')){
            // Generate a unique file name and store the image in 'public/images/cars'
            $image_urlName = time().'.'.$request->image_url->extension();
            $request->image_url->move(public_path('images/cars'), $image_urlName);
        }

        // Create a new car record in the database with validated data
        Car::create([
            'model' => $request->model,
            'type' => $request->type,
            'year' => $request->year,
            'image_url' => $image_urlName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the cars listing page with a success message
        return to_route('cars.index')->with('success', 'Car created successfully');
    }

    /**
     * Display the specified resource.
     * This method shows details of a specific car.
     */
    public function show(Car $car)
    {
        // Pass the car data to the 'cars.show' view for display
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     * This method displays the form to edit an existing car.
     */
    public function edit(Car $car)
    {
        // Pass the specific car data to the 'cars.edit' view
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     * Validates and updates the car details, including handling image updates.
     */
    public function update(Request $request, Car $car)
    {
        // Validate the incoming request data
        $validatedData  = $request->validate([
            'model' => 'required',
            'type' => 'required|max:100',
            'year' => 'required|integer',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:2048', // Image optional for update
        ]);

        // Prepare data for updating
        $data = $request->only(['model', 'type', 'year']);

        // Check if a new image file is provided
        if ($request->hasFile('image_url')) {
            // If there's an old image, delete it from the server
            if ($car->image_url && file_exists(public_path($car->image_url))) {
                unlink(public_path($car->image_url));
            }

            // Store the new image and add its filename to the data array
            $image_url = time() . '.' . $request->file('image_url')->extension();
            $request->file('image_url')->move(public_path('images/cars'), $image_url);
            $data['image_url'] = $image_url;
        }

        // Update the car record in the database
        $car->update($data);

        // Redirect to the cars listing page with a success message
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * Deletes the specified car and redirects to the cars listing.
     */
    public function destroy(Car $car)
    {
        // Delete the car record from the database
        $car->delete();

        // Redirect to the cars listing with a success message
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
