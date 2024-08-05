<?php

namespace App\Http\Controllers;

use App\Models\Sacerdote;
use App\Models\Parroco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SacerdoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sacerdotes = Sacerdote::all();
        return view('admin.priestadmin', compact('sacerdotes'));
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre_sacerdote'=>'required',
            'ap_paterno_sacerdote'=>'required',
            'ap_materno_sacerdote'=>'required',
            'licenciatura_sacerdote'=>'required',
        ]);

        $sacerdote = Sacerdote::create([
            'nombre'=>$request->nombre_sacerdote,
            'ap_paterno'=>$request->ap_paterno_sacerdote,
            'ap_materno'=>$request->ap_materno_sacerdote,
            'licenciatura'=>$request->licenciatura_sacerdote,
        ]);

        return redirect()->route('priest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sacerdote $sacerdote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sacerdote $sacerdote)
    {
        return view('admin.components.modalEpriest', ['sacerdote' => $sacerdote]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sacerdote $sacerdote)
    {
        $request -> validate([
            'nombre_sacerdote'=>'required',
            'ap_paterno_sacerdote'=>'required',
            'ap_materno_sacerdote'=>'required',
            'licenciatura_sacerdote'=>'required',
        ]);
        
        $sacerdote->update([
            'nombre' => $request->nombre_sacerdote,
            'ap_paterno' => $request->ap_paterno_sacerdote,
            'ap_materno' => $request->ap_materno_sacerdote,
            'licenciatura' => $request->licenciatura_sacerdote,
        ]);        

        return redirect()->route('priest.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sacerdote $sacerdote)
    {
        $sacerdote->delete();
        return redirect()->route('priest.index');
    }

    public function asignarParroco($id){

        $sacerdote = Sacerdote::findOrFail($id);
        
        if(!$sacerdote->parroco){
            Parroco::create(['id_sacerdote' => $sacerdote->id]);
        }

        return redirect()->route('priest.index');
    }

    public function quitarParroco($id){

        $sacerdote = Sacerdote::findOrFail($id);

        if($sacerdote->parroco){
            Parroco::where('id_sacerdote', $sacerdote->id)->delete();
        }

        return redirect()->route('priest.index');
    }
}
