<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObjectResponse;

class GeolocationController extends Controller
{
    public function send(Request $coordenadas){
        $response = ObjectResponse::DefaultResponse();
        try {
            $latitud = $coordenadas->input('latitud');
            $longitud = $coordenadas->input('longitud');
            // $crdnds=response()->json_encode(array(
            //     "statys"=>200,
            //     "response"=>array(
            //         "latitud"=>$latitud,
            //         "longitud"=$longitud
            // ));
            return response()->json($coordenadas);
            $response = ObjectResponse::CorrectResponse();
            data_set($response, 'message', 'peticion satisfactoria | coordenadas enviadas');
            data_set($response, 'alert_text', 'coordenadas enviadas');
            data_set($response,'data',$coordenadas);
        }
        catch(\Exception $ex){
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response, $response["status_code"]);    
    }

    public function receive(){
        $response = ObjectResponse::DefaultResponse();
        try {
            $coordenadas = send().js;
            return response()->json($coordenadas);
            $response = ObjectResponse::CorrectResponse();
            data_set($response, 'message', 'peticion satisfactoria | coordenadas enviadas');
            data_set($response, 'alert_text', 'coordenadas enviadas');
        }
        catch(\Exception $ex){
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response, $response["status_code"]);
    }
}
