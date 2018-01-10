<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::paginate(2);
        $dias = ['1' => 'Lunes', '2' => 'Martes', '3' => 'Miercoles', '4' => 'Jueves', '5' => 'Viernes', '6' => 'Sabado', '0' => 'Domingo',];
        foreach ($schedules as $schedule) {
            $d=[];
            $dias_n = explode(',', $schedule->dias);
            foreach ($dias_n as $item) {
                if(array_key_exists($item, $dias)){
                    array_push($d,$dias[$item]);
                }
            }
            $schedule->dias = $d;
        }
        return view("horarios.index", ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hora_ini' => 'required',
            'hora_fin' => 'required',
            'dias' => 'required',
            'intervalo' => 'required'
        ]);
        $data = $request->all();
        $data['hora_ini'] = date("H:i", strtotime($request->get('hora_ini')));
        $data['hora_fin'] = date("H:i", strtotime($request->get('hora_fin')));
        $data['dias'] = implode(",", $request->get('dias'));
        //return dd($data);
        Schedule::create($data);
        return redirect('horarios')->with(['status'=> ['success','Horario se guardó exitosamente.']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //No disponible
        return redirect('horarios')->with(['status'=> ['warning','Acción no disponible!']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        if (empty($schedule)) {
            return redirect('horarios')->with(['status'=> ['danger','Horario no encontrado!']]);
        }
        return view('horarios.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $schedule = Schedule::find($id);
        if (empty($schedule)) {
            return redirect('horarios')->with(['status'=> ['danger','Horario no encontrado!']]);
        }
        $request->validate([
            'hora_ini' => 'required',
            'hora_fin' => 'required',
            'dias' => 'required',
            'intervalo' => 'required'
        ]);
        $data = $request->all();
        $data['hora_ini'] = date("H:i", strtotime($request->get('hora_ini')));
        $data['hora_fin'] = date("H:i", strtotime($request->get('hora_fin')));
        $data['dias'] = implode(",", $request->get('dias'));
        $schedule->fill($data);
        $schedule->save();
        return redirect('horarios')->with(['status'=> ['success','Horario actualizado con éxito.']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        if (empty($schedule)) {
            return redirect('horarios')->with(['status'=> ['danger','Horario no encontrado!']]);
        }
        $schedule->delete();
        return redirect('horarios')->with(['status'=> ['success','Horario eliminado con éxito.']]);
    }
}
