<?php

namespace App\Http\Controllers;

use App\Appoinment;
use App\Schedule;
use App\Tipo_Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoinmentController extends Controller
{

    function __construct()
    {
        $this->middleware('auth', ['except' => array('disponibilidad_hora', 'disponibilidad')]);
    }

    public function index()
    {
        $tipo_citas = Tipo_Cita::pluck('descripcion', 'id');
        return view('citas.index', compact('tipo_citas'));
    }

    public function store(Request $request)
    {
        $request['fec_fin'] = date("H:i", strtotime($request->get('hora_ini')) + (60 * 60 * (int)$request->get('intervalo')));
        $request['hora_ini'] = date("H:i", strtotime($request->get('hora_ini')));
        $request['usuario_id'] = Auth::id();
        $request->validate([
            "tipo" => 'required',
            "descripcion" => 'required|min:18',
            "tipo_cita_id" => 'required',
            "usuario_id" => 'required',
            "fec_hora" => 'required|date',
            "hora_ini" => 'required',
        ]);
        $appoinment = new Appoinment($request->all());
        $appoinment->save();
        return redirect('citas')->with(['status' => ['success', 'Su reserva se guardó exitosamente. Confirme su pago para activar.']]);
    }

    public function disponibilidad()
    {
        $schedules = Schedule::all();
        $enabled_days = $schedules->implode('dias', ',');
        return response($enabled_days);
    }

    public function disponibilidad_hora($dia)
    {
        $data = json_decode($dia);
        $schedules = Schedule::where('dias', 'like', '%' . $data->dia_s . '%')->get();
        $appoinments = Appoinment::select('fec_hora', 'hora_ini', 'fec_fin')->whereDate('fec_hora', $data->fecha)->get();
        $hour_disabled = array();
        for ($i = 0; $i < $appoinments->count(); $i++) {
            array_push($hour_disabled, substr($appoinments[$i]->hora_ini, 0, 5), substr($appoinments[$i]->fec_fin, 0, 5));
        }
        $hours = array();
        foreach ($schedules as $schedule) {
            $inicia = (int)substr($schedule->hora_ini, 0, strpos($schedule->hora_ini, ':'));
            $termina = (int)substr($schedule->hora_fin, 0, strpos($schedule->hora_fin, ':'));
            $intervalo = (int)$schedule->intervalo;
            $intervalo_ini = substr($schedule->hora_ini, strpos($schedule->hora_ini, ':') + 1, 2);
            for ($i = $inicia; $i < $termina; $i += $intervalo) {
                array_push($hours, $i . ":" . $intervalo_ini);
            }
        }

        $result = array();
        for ($i = 0; $i < count($hours); $i++) {
            if (!in_array($hours[$i], $hour_disabled)) {
                array_push($result, $hours[$i]);
            }
        }

        //echo dd($result);
        return [$result, $intervalo];

    }

    public function myAppoinments()
    {
        return view('citas.appoinment');
    }

    public function my_current_appointments()
    {
        $response = [];
        $appoinments = Appoinment::where('usuario_id', Auth::id())->get();
        //dd($appoinments);
        foreach ($appoinments as $appoinment) {
            $response[] =
                [
                    'id' => $appoinment->id,
                    'title' => "Terapia ".$appoinment->tipo_cita->descripcion,
                    'start' => $appoinment->fec_hora.'T'.$appoinment->hora_ini,
                    'end' => $appoinment->fec_hora.'T'.$appoinment->fec_fin
                ];
        }
        return response($response);
    }

}
