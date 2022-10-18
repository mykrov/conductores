<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use PhpParser\Node\Stmt\TryCatch;

class VehiculoController extends Controller
{
    public function List()
    {
        try {
            $list = Vehiculo::all();
            if ($list !== null) {
                return response()->json($list, 200);
            }
            return response()->json([], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
