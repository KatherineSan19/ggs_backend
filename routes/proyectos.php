<?php
use Illuminate\Http\Request;


$router->get('/proyecto', function () use ($router){
  $project = DB::select("select p.id_proyecto, p.titulo, p.img_ubicacion, p.html, p.img_antes, p.img_despues, p.proyecto_tipo_id,
                            pf.titulo AS titular, pf.texto, ps.img, pt.tab, pt.html AS contenido
                            from proyectos p INNER JOIN proyectos_galeria pg ON pg.proyecto_id = p.id_proyecto
                            INNER JOIN proyectos_ficha pf ON p.id_proyecto= pf.proyecto_id
                            INNER JOIN proyectos_slider ps ON p.id_proyecto = ps.id_proyecto_slider
                            INNER JOIN proyectos_tabs pt ON p.id_proyecto = pt.proyecto_id
                            ");
  $response=new stdClass;
  if(count($project)>0){
      $response->proyecto = $project;
      return response()->json($response);

  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});

$router->get('/mas_proyectos', function () use ($router){
  $galeria= DB:: select("select p.id_proyecto, p.titulo, p.ciudad, p.categoria, p.fecha_creacion, p.url_img
                        from proyectos p limit 4");
  $response=new stdClass;
  if(count($galeria)>0){
      $response->galeria = $galeria;
      return response()->json($response);

  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});

$router->get('/proyectos', function () use ($router){
  $galeria= DB:: select("select p.id_proyecto, p.titulo, p.ciudad, p.categoria, p.fecha_creacion, p.url_img
                        from proyectos p");
  $response=new stdClass;
  if(count($galeria)>0){
      $response->galeria = $galeria;
      return response()->json($response);

  }else{
    $response->message = "No existe el registro de contacto";
    return response()->json($response, 400);
  }

});
