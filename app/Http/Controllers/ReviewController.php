<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

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
      
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('cars.index')->with('error', 'Access denied.');
        }

        // return view('cars.edit', compact('car'));
        
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->only(['rating', 'comment']));

        return redirect()->route('cars.show', $review->car_id)
        ->with('success', 'Review updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        // Check if the current user is the owner of the review or an admin
        if ($review->user_id === auth()->id() || auth()->user()->role === 'admin') {
            // Delete the review from the database
            $review->delete();

            // Flash success message and redirect
            return redirect()->route('cars.show', $review->car_id)
                ->with('success', 'Review deleted successfully.');
        }

        // If the user is not authorized to delete the review
        return redirect()->route('cars.show', $review->car_id)
            ->with('error', 'You are not authorized to delete this review.');
    }
}
