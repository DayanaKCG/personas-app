<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;


class MunicipioController extends Controller
{
        public function index()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return json_encode(['municipios'=>$municipios]);
    }

    
    public function store(Request $request)
    {
        //
    }

        public function show($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    /**

     */
    public function destroy($id)
    {
        //
    }
}
