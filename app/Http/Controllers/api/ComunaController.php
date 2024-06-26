<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comuna;

class ComunaControler extends Controller
{
       public function index()
    {
        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio' , 'tb_comuna.muni_codi' , '=' ,'tb_municipio.muni_codi')
        ->select('tb_comuna.*', "tb_municipio.muni_nomb")
        ->get();
        return response()->json(['comunas'=>$comunas]);
    }

    public function store(Request $request)
    {
        //
        $comuna = new Comuna();
        $comuna ->comu_nomb = $request ->comu_nomb;
        $comuna->muni_codi=$request->muni_codi;
        $comuna->save();
        return json_encode(['comuna'=>$comuna]);    
    }

    
    public function show($id)
    {
        $comuna= Comuna::find($id);
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();

        return json_encode(['comuna'=>$comuna,'municipios'=>$municipios]);
    }

    public function update(Request $request, $id)
    {
        //
        $comuna = Comuna::find($id);
        $comuna ->comu_nomb=$request->comu_nomb;
        $comuna->muni_codi=$request->muni_codi;
        $comuna->save();
        return json_encode(['comuna'=>$comuna]);
    }

    
    public function destroy($id)
    {
        //
        $comuna = Comuna::find($id);
        $comuna ->delete();
        $comunas=DB::table('tb_comuna')
        -> join('tb_municipio', 'tb_comuna.muni_codi', '-', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', "tb_municipio.muni_nomb")
        ->get();
        return json_encode(['comunas'->$comunas, 'seccess'=>true]);
    }
}
