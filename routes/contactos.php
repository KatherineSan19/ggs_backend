<?php
use Illuminate\Http\Request;



$router->get('/contacto', function () use ($router) {
  $contact = DB::table('contactos')->select('ubicacion', 'direccion','ciudad','pais','telefono','correo','latitud')->get();
  $response = new stdClass;
  if(count($contact)>0){
    $response->contacto = $contact[0];
    return response()->json($response);
  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }
});

//Enter your mail / Contacto
$router->post('/email', function (Request $request ) use ($router) {

$email =DB::table('correos')->insert(['correo' => $request->mail]);
$email=new stdClass;
if(count($email)>0){
    $response->email = $email;
    return response()->json($response);

}else{
  $response->message = "Sorry, there is no record";
  return response()->json($response, 400);
}
});
