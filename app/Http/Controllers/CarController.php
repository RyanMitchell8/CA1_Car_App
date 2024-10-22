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
    public function index()
    {
        $cars = Car::all();
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
            $request->image_url->move(public_path('images/cars'), image_urlName);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
