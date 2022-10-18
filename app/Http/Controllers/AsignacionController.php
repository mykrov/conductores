<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Conductor;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $idVehiculo = $r->vehiculo;
        $idConductor = $r->conductor;

        $asignacion = new Asignacion();
        $asignacion->vehiculo = $idVehiculo;
        $idConductor->conductor = $idConductor;

        try {
            $asignacion->save();
            return response()->json(['status'=> 'ok'],201);
        } catch (\Throwable $th) {
            return response()->json(['status'=> 'error'],500);
        }
       
    }

    public function homeAsigancion()
    {
        $listaAsignaciones  = DB::table('asignacion')
        ->join('conductor','asignacion.conductor','conductor.id')
        ->join('vehiculo','asignacion.vehiculo','vehiculo.idvehiculo')
        ->select(
            'asignacion.idasignacion',
            'conductor.nombre',
            'conductor.apellido',
            'vehiculo.idvehiculo',
            'vehiculo.modelo',
            'vehiculo.marca'
            )
        ->get();
       
        $listaConductores = Conductor::all();
        $listaVehiculos = Vehiculo::all();

        return view('table',['conductores'=>$listaConductores,'vehiculos'=>$listaVehiculos, 'asignaciones'=>$listaAsignaciones ]);

    }
}
