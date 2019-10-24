<?php
use Illuminate\Http\Request;


$router->get('/proyecto', function () use ($router) {
  $integrante = DB::select("select * from proyectos");
  $response=new stdClass;
  if(count($integrante)>0){
      $response->equipo = $integrante;
      return response()->json($response);

  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});

$router->get('/proyecto/{id_proyecto}',function ($id_proyecto){
  $project = DB::table('proyectos')->where('id_proyecto', $id_proyecto)->get();
  return response()->json($project);
});


$router->get('galeria', function () use ($router){
  $galeria= DB:: select("select pg.id_proyecto_galeria, pg.img, pg.proyecto_id, p.titulo
                        from proyectos_galeria pg INNER JOIN proyectos p ON pg.proyecto_id = p.id_proyecto");
  $response=new stdClass;
  if(count($galeria)>0){
    $response->galeria = $galeria;
    return response()->json($response);

  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});
