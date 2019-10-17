<?php
use Illuminate\Http\Request;

$router->get('/noticia', function () use ($router) {
  $informacion = DB::table('noticias')->get();
  return response()->json($infromacion);

});
