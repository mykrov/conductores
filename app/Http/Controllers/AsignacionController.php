<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Conductor;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AsignacionController extends Controller
{
    public function List()
    {
        try {
            $list = Asignacion::with('conductor', 'vehiculo')->get();

            if ($list !== null) {
                return response()->json($list, 200);
            }
            return response()->json([], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function Asignar(Request $r)
    {
        Log::info('Nueva Asignacion', ['peticion' => $r]);
        $idConductor = $r->conductor;
        $idVehiculo = $r->vehiculo;

        $asignacion = new Asignacion();
        $asignacion->vehiculo = $idVehiculo;
        $asignacion->conductor = $idConductor;

        try {
            $asignacion->save();
            return response()->json(['status' => 'ok'], 201);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error'], 500);
        }
    }

    public function homeAsigancion()
    {
        $listaAsignaciones  = DB::table('asignacion')
            ->join('conductor', 'asignacion.conductor', 'conductor.id')
            ->join('vehiculo', 'asignacion.vehiculo', 'vehiculo.idvehiculo')
            ->select(
                'asignacion.idasignacion',
                'conductor.nombre',
                'conductor.apellido',
                'vehiculo.idvehiculo',
                'vehiculo.modelo',
                'vehiculo.marca',
                'vehiculo.placa',
                'conductor.cedula'
            )
            ->get();

        $listaConductores = Conductor::all();
        $listaVehiculos = Vehiculo::all();

        return view('table', ['conductores' => $listaConductores, 'vehiculos' => $listaVehiculos, 'asignaciones' => $listaAsignaciones]);
    }

    public function vueAsignacion()
    {
        return view('vue');
    }
}
