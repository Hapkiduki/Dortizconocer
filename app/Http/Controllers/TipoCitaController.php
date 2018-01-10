<?php

namespace App\Http\Controllers;

use App\Tipo_Cita;
use Illuminate\Http\Request;

class TipoCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocitas = Tipo_Cita::orderBy('id', 'DESC')->paginate(5);
        return view("tipocita.index", ['tipocitas' => $tipocitas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipocita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|min:3',
        ]);
        Tipo_Cita::create($request->all());
        //return dd($data);
        return redirect('tipocita')->with(['status'=> ['success','Tipo de cita se guardó exitosamente.']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocita = Tipo_Cita::find($id);
        if (empty($tipocita)) {
            return redirect('tipocita')->with(['status'=> ['danger','Tipo de cita no encontrada!']]);
        }
        return view('tipocita.edit', compact('tipocita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipocita = Tipo_Cita::find($id);
        if (empty($tipocita)) {
            return redirect('tipocita')->with(['status'=> ['danger','Tipop de cita no encontrada!']]);
        }
        $request->validate([
            'descripcion' => 'required|min:3'
        ]);
        $tipocita->fill($request->all());
        $tipocita->save();
        return redirect('tipocita')->with(['status'=> ['success','Tipo de cita actualizada con éxito.']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipocita = Tipo_Cita::find($id);
        if (empty($tipocita)) {
            return redirect('tipocita')->with(['status'=> ['danger','Tipo de cita no encontrada!']]);
        }
        $tipocita->delete();
        return redirect('tipocita')->with(['status'=> ['success','Tipo de cita eliminada con éxito.']]);
    }
}
