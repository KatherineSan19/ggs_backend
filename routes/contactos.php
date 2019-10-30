<?php
use Illuminate\Http\Request;



$router->get('/contacto', function () use ($router) {
  $contact = DB::table('contactos')->select('ubicacion', 'direccion','ciudad','pais','telefono','correo')->get();
  $response = new stdClass;
  if(count($contact)>0){
    $response->contacto = $contact[0];
    return response()->json($response);
  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});
