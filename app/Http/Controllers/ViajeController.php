<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Http\Helper\ResponseBuilder;
use DB;
class ViajeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function allSinRestricciones(Request $request){
        $viaje = Viaje::all();
        $status = true;
        $info = "Viajes List";
        return ResponseBuilder::result($status,$info,$viaje);
    }
    public function allJson(Request $request){
        if($request->Json()){
            $viaje = Viaje::all();
            $status = true;
            $info = "Viajes List";
            return ResponseBuilder::result($status,$info,$viaje);
        }
        $status = false;
        $info = "Unathorized";
        return response()->json(['error'=>'Unathorized'],401,[]);
    }
    public function getViaje(Request $request,$numero){
        if($request->Json()){
            $cliente = Viaje::where('numero',$numero)->first();
            if(!empty($cliente)){
                $status=true;
                $info="Viaje in here";
                return ResponseBuilder::result($status,$info,$cliente);
            }else{
                $status=false;
                $info="Viaje is not here";
                return ResponseBuilder::result($status,$info,$cliente);
            }
            
        }
        $status=false;
        $info="error Unathorized";
        return ResponseBuilder::result($status,$info);
    }
    public function createViaje(Request $request){
        if($request->Json()){
            $data=$request->json()->all();
            $cliente = Viaje::create([
                'numero' => $data['numero'],
                'destino'=>$data['capacidad'],
                'fechaViaje'=>$data['puestos_Disponibles'],
                'fechaLlegada'=>$data['estado'],
                'estado'=>$data['estado'],
                'avion_id'=>$data['avion_id'],
            ]);
            $status=true;
            $info="Viaje create successfully";
            return ResponseBuilder::result($status,$info);
        }
        return response()->json(['error'=>'Unathorized'],401,[]);
    }
}
