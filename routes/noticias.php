<?php
use Illuminate\Http\Request;

$router->get('/noticia/{id}', function ($id) use ($router) {
  $noticia=DB::table('noticias')
              ->join('usuarios', 'usuarios.id_usuario', '=', 'noticias.id_noticia')
              ->join('noticias_tipo', 'noticias_tipo.id_noticia_tipo', '=', 'noticias.noticia_tipo_id')
              ->select('noticias.*', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.correo', 'usuarios.img_usuario', 'noticias_tipo.tipo')
              ->where('noticias.id_noticia','=',$id)
              ->get();
  $response=new stdClass;
  if(count($noticia)>0){
    $response->noticia = $noticia[0];
    return response()->json($response);
  }else{
    $response->message = "The news record does not exist";
    return response()->json($response, 400);
  }
});

/*
//Proyecto_Ficha_Tecnica.

$router->get('/ficha', function () use ($router){
  $ficha= DB:: select("SELECT * FROM proyectos_ficha WHERE id_proyecto_ficha = '1'");
  $response=new stdClass;
  if(count($ficha)>0){
      $response->ficha = $ficha;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});
$router->get('/cliente', function () use ($router){
  $cliente= DB:: select("SELECT * FROM proyectos_ficha WHERE id_proyecto_ficha = '2'");
  $response=new stdClass;
  if(count($cliente)>0){
      $response->cliente = $cliente;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});

$router->get('/equi', function () use ($router){
  $equi= DB:: select("SELECT * FROM proyectos_ficha WHERE id_proyecto_ficha = '3'");
  $response=new stdClass;
  if(count($equi)>0){
      $response->equi = $equi;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});

$router->get('/colaboradores', function () use ($router){
  $colaboradores= DB:: select("SELECT * FROM proyectos_ficha WHERE id_proyecto_ficha = '4'");
  $response=new stdClass;
  if(count($colaboradores)>0){
      $response->colaboradores = $colaboradores;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});
/*
$router->get('/noticia', function () use ($router) {
  $response = new stdClass;
  $info= DB::select("select * from usuarios where id_usuario='1'");
  if(count($info)>0){
    $noti = DB::select("select * from noticias where id_noticia='1'");
    $info[0]->noti = $noti;
    $response->usuario = $info[0];

    return response() ->json($response);
  }else{
    $response->message = "No existe el registro Noticia de Augustina";
    return response()->json($response, 400);
  }
});
*/
