<?php
use Illuminate\Http\Request;

$router->get('/oficina', function () use ($router) {
  $text = DB::table('textos_parametrizados')->where('parametro', 'CONTACTO_BIENVENIDOS')->value('html');
  return response()->json($text);

});

$router->get('/home', function () use ($router) {
  //$text = DB::table('textos_parametrizados')->find(1);
  $home = DB::table('textos_parametrizados')->where('parametro', 'HOME_DESCRIPCION')->get();
  $response = new stdClass;
  if(count($home)>0){
    $response->home = $home[0];
    return response()->json($response);
  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }
});
