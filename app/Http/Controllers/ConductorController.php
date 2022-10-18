<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Conductor;

class ConductorController extends Controller
{
    public function List()
    {
        try {
            $list = Conductor::all();

            if ($list !== null) {
                return response()->json($list, 200);
            }
            return response()->json([], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
