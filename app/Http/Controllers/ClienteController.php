<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Helper\ResponseBuilder;
use DB;

class ClienteController extends Controller{
    
    public function __construct(){
        //
    }

    //
    public function allSinRestricciones(Request $request){
        $cliente = Cliente::all();
        $status = true;
        $info = "Clients List";
        return ResponseBuilder::result($status,$info,$cliente);
    }
    public function allJson(Request $request){
        if($request->Json()){
            $cliente = Cliente::all();
            $status = true;
            $info = "Clients List";
            return ResponseBuilder::result($status,$info,$cliente);
        }
        $status = false;
        $info = "Unathorized";
        return response()->json(['error'=>'Unathorized'],401,[]);
    }
    //
    public function getCliente(Request $request,$cedula){
        if($request->Json()){
            $cliente = Cliente::where('cedula',$cedula)->first();
            if(!empty($cliente)){
                $status=true;
                $info="Client in here";
                return ResponseBuilder::result($status,$info,$cliente);
            }else{
                $status=false;
                $info="Client is not here";
                return ResponseBuilder::result($status,$info,$cliente);
            }
            
        }
        $status=false;
        $info="error Unathorized";
        return ResponseBuilder::result($status,$info);
    }
    public function create(Request $request){
        if($request->Json()){
            $data=$request->json()->all();
            $cliente = Cliente::create([
                'cedula' => $data['cedula'],
                'nombres'=>$data['nombres'],
                'apellidos'=>$data['apellidos'],
                'genero'=>$data['genero'],
                'correo'=>$data['correo'],
                'celular'=>$data['celular'],
                'date_created'=>$data['date_created'],
                'avion_id'=>$data['avion_id'],
            ]);
            $status=true;
            $info="Client create successfully";
            return ResponseBuilder::result($status,$info);
        }
        return response()->json(['error'=>'Unathorized'],401,[]);
    }
}
