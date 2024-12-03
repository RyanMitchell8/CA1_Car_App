<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Car;  // Added import for Car model
use Illuminate\Http\Request; 

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Car $car)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to leave a review.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Create the review for the car
        $car->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'car_id' => $car->id
        ]);

        return redirect()->route('cars.show', $car)->with('success', 'Review created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        // Ensure that the user is the owner of the review or an admin
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('cars.index')->with('error', 'Access denied.');
        }

        // Return the edit view with the review
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        // Validate the input fields
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Update the review
        $review->update($request->only(['rating', 'comment']));

        return redirect()->route('cars.show', $review->car->id)
            ->with('success', 'Review updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        // Ensure the user is authorized to delete the review
        if ($review->user_id === auth()->id() || auth()->user()->role === 'admin') {
            // Delete the review from the database
            $review->delete();

            // Flash success message and redirect
            return redirect()->route('cars.show', $review->car->id)
                ->with('success', 'Review deleted successfully.');
        }

        // If the user is not authorized to delete the review
        return redirect()->route('cars.show', $review->car->id)
            ->with('error', 'You are not authorized to delete this review.');
    }
}
