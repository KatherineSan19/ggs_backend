<?php
use Illuminate\Http\Request;


$router->get('/proyecto/{id}', function ($id) use ($router){
  $proyecto = DB::table('proyectos')
              ->select('proyectos.id_proyecto', 'proyectos.titulo', 'proyectos.img_ubicacion', 'proyectos.html', 'proyectos.img_antes', 'proyectos.img_despues', 'proyectos.categoria', 'proyectos.ciudad', 'proyectos.url_img')
              ->where('proyectos.id_proyecto','=',$id)
              ->get();
  $response=new stdClass;
  if(count($proyecto)>0){
      $proyecto[0]->tabs = DB::table('proyectos_tabs')->where('proyectos_tabs.proyecto_id', '=',$proyecto[0]->id_proyecto)->get();
      $proyecto[0]->ficha = DB::table('proyectos_ficha')->where('proyectos_ficha.proyecto_id', '=',$proyecto[0]->id_proyecto)->get();
      $response->proyecto = $proyecto[0];
      return response()->json($response);
  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }
});

//categoria-pro que estan en /oficina

$router->get('/proyectof', function () use ($router){
  $proyectof= DB:: select("select p.id_proyecto, p.titulo, p.ciudad, p.categoria, p.fecha_creacion, p.url_img
                        from proyectos p limit 4");
  $response=new stdClass;
  if(count($proyectof)>0){
      $response->proyectof = $proyectof;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }
});

//Contactos/Algunos.proyectos_slider

$router->get('/otherpro', function () use ($router){
  $otherpro= DB:: select("select p.id_proyecto, p.titulo, p.ciudad, p.categoria, p.fecha_creacion, p.html
                        from proyectos p limit 4");
  $response=new stdClass;
  if(count($otherpro)>0){
      $response->otherpro = $otherpro;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});

//categoria-pro que estan en /proyectos

$router->get('/proyectos', function () use ($router){
  $proyectos= DB::select("SELECT * FROM proyectos WHERE id_proyecto >= '5'");
  $response=new stdClass;
  if(count($proyectos)>0){
      $response->proyectos = $proyectos;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});

//Galerias en proyectos

$router->get('/galerias', function () use ($router){
  $galerias= DB:: select("select p.id_proyecto_galeria, p.img, p.activo, p.usuario_creacion, p.fecha_creacion, p.proyecto_id
                          from proyectos_galeria p");
  $response=new stdClass;
  if(count($galerias)>0){
      $response->galerias = $galerias;
      return response()->json($response);

  }else{
    $response->message = "Sorry, there is no record";
    return response()->json($response, 400);
  }

});
