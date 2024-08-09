<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::orderByDesc('start_date')->get();
        // $travels = Travel::all();


        return view('admin.home', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Aggiungi un nuovo Viaggio';
        $route=route('admin.travels.store');
        $travel=null;
        $button='Salva';
        $method= 'POST';
        // $types = Type::all();
        // $technologies = Technology::all();

        return view('admin.travel.create-edit', compact('title','travel', 'button','method'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Travel $travel)
    {
        $title='Modifica Viaggio';
        $route=route('admin.travels.update', $travel);
        $button='Salva' ;
        $method= 'PUT';
        // $types = Type::all();
        // $technologies = Technology::all();
        return view('admin.travels.create-edit', compact('title','route','travel', 'button','method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Travel $travel)
    {
        $travel->delete();

        return redirect()->route('adimn.home')->with('deleted', 'Il progetto'. ' ' . $travel->name. ' ' .'è stato cancellato con successo!');
    }
}
