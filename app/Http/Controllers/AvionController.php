<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Avion;
use App\Http\Helper\ResponseBuilder;
use DB;

class AvionController extends Controller{
    
    public function __construct(){
        //
    }

    //
    public function allSinRestricciones(Request $request){
        $cliente = Avion::all();
        $status = true;
        $info = "Avion List";
        return ResponseBuilder::result($status,$info,$cliente);
    }
    public function allJson(Request $request){
        if($request->Json()){
            $cliente = Avion::all();
            $status = true;
            $info = "Avion List";
            return ResponseBuilder::result($status,$info,$cliente);
        }
        $status = false;
        $info = "Unathorized";
        return response()->json(['error'=>'Unathorized'],401,[]);
    }
    //
    public function getAvion(Request $request,$numero){
        if($request->Json()){
            $cliente = Avion::where('numero',$numero)->first();
            if(!empty($cliente)){
                $status=true;
                $info="Avion in here";
                return ResponseBuilder::result($status,$info,$cliente);
            }else{
                $status=false;
                $info="Avion is not here";
                return ResponseBuilder::result($status,$info,$cliente);
            }
            
        }
        $status=false;
        $info="error Unathorized";
        return ResponseBuilder::result($status,$info);
    }
    public function createAvion(Request $request){
        if($request->Json()){
            $data=$request->json()->all();
            $cliente = Cliente::create([
                'numero' => $data['numero'],
                'capacidad'=>$data['capacidad'],
                'puestos_Disponibles'=>$data['puestos_Disponibles'],
                'estado'=>$data['estado'],
            ]);
            $status=true;
            $info="Avion create successfully";
            return ResponseBuilder::result($status,$info);
        }
        return response()->json(['error'=>'Unathorized'],401,[]);
    }
}
