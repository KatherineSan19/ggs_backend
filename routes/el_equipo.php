<?php
use Illuminate\Http\Request;



$router->get('/equipo', function () use ($router) {
  $integrante = DB::table('el_equipo')->get();
  $response=new stdClass;
  if(count($integrante)>0){
      $response->equipo = $integrante;
      return response()->json($response);

  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});