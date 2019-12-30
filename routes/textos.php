<?php
use Illuminate\Http\Request;

$router->get('/oficina', function () use ($router) {
  $text = DB::table('textos_parametrizados')->where('parametro', 'CONTACTO_BIENVENIDOS')->value('html');
  return response()->json($text);

});

$router->get('/home', function () use ($router) {
  $home = DB::table('textos_parametrizados')->where('parametro', 'HOME_DESCRIPCION')->get();
  $response = new stdClass;
  if(count($home)>0){
    $response->home = $home[0];
    return response()->json($response);
  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }
});

$router->get('/homed', function () use ($router) {
  $homed = DB::table('textos_parametrizados')->where('parametro', 'CONTACTO_BIENVENIDOS')->get();
  $response = new stdClass;
  if(count($homed)>0){
    $response->homed = $homed[0];
    return response()->json($response);
  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }
});

//la arquitectura solo se considera completa con la intervencio?n del ser humano que la experimenta

$router->get('/homes', function () use ($router) {
  $homes = DB::table('textos_parametrizados')->where('id_texto_parametrizado', '4')->get();
  $response = new stdClass;
  if(count($homes)>0){
    $response->homes = $homes[0];
    return response()->json($response);
  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }
});
