<?php
use Illuminate\Http\Request;

$router->get('/noticia', function () use ($router) {
  $noticia = DB::table('noticias')
            ->join('usuarios', 'usuarios.id_usuario', '=', 'noticias.usuario_creacion_id')
            ->join('noticias_tipo', 'noticias.noticia_tipo_id', '=', 'noticias_tipo.id_noticia_tipo')
            ->select('noticias.*', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.correo', 'usuarios.img_usuario', 'noticias_tipo.tipo')
            ->get();
  $response=new stdClass;
  if(count($noticia)>0){
    $response->noticia = $noticia;
    return response()->json($response);
  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});
