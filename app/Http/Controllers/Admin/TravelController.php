<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Functions\Helper as Help;
use Illuminate\Support\Facades\Storage;

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
        $route=route('adimn.travel.store');
        $travel=null;
        // $button='<i class="fa-solid fa-floppy-disk"></i>';
        $method= 'POST';
        // $types = Type::all();
        // $technologies = Technology::all();

        return view('admin.travel.create-edit', compact('title','travel', 'route', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelRequest $request)
    {
        $form_data = $request->all();

        // verifico l'esistenza della chiave 'image' in $form_data
        if(array_key_exists('photo', $form_data)) {
            // salvo immagine nello storage e ottengo il percorso
            $image_path = Storage::put('uploads', $form_data['photo']);

            $form_data['photo'] = $image_path;

        }

        $form_data['slug'] = Help::generateSlug($form_data['name'], Travel::class);
        $new_travel = new Travel();


        $new_travel->fill($form_data);

        $new_travel->save();

                // if(array_key_exists('technologies', $form_data)) {
                //     $new_travel->technologies()->attach($form_data['technologies']);
                // }

        return redirect()->route('adimn.home')->with('success', 'Viaggio aggiunto correttamente!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        return view('admin.travel.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        $title='Modifica Viaggio';
        $route=route('adimn.travel.update', $travel);
        // $button= ;
        $method= 'PUT';
        // $types = Type::all();
        // $technologies = Technology::all();
        return view('admin.travel.create-edit', compact('title','route','travel', 'method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelRequest $request, Travel $travel)
    {
        $form_data = $request->all();


        // verifico l'esistenza della chiave 'image' in $form_data
       if(array_key_exists('photo', $form_data)){
           // salvo l'immagine nello storage e ottengo il percorso
           $image_path = Storage::put('uploads', $form_data['photo']);

           $form_data['image']= $image_path;
        }

       if($form_data['name'] === $travel->name){
       $form_data['slug'] = $travel->slug;
       }else{
           $form_data['slug'] = Help::generateSlug($form_data['name'], Travel::class) ;
       }

       $travel->update($form_data);


       return redirect()->route('adimn.home',$travel)->with('update', 'Il viaggio è stato aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Travel $travel)
    {
        $travel->delete();

        return redirect()->route('adimn.home')->with('deleted', 'Il viaggio'. ' ' . $travel->name. ' ' .'è stato cancellato con successo!');
    }
}
