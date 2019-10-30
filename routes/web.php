<?php
use App\Models\Prueba;
use App\Models\Usuario;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//
//     return $router->app->version();
// });

//Prueba

$router->get('/', function () use ($router) {
  //return response()->json("Ruta prueba");
  $results = DB::select("SELECT * FROM textos_parametrizados");
  return response()->json($results);

});

$router->get('/usuarios', function () use ($router) {
  //return response()->json("Ruta prueba");
  //return response()->json(Usuario::all());
  $users = DB::table('usuarios')->get();
  return response()->json($users);
});


$router->post('/usuarios/nuevo', function (Request $request) use ($router) {
  $nuevo = new Usuario();
  $nuevo -> nombre=$request->input('nombre');
  $nuevo -> apellido=$request->input('apellido');
  $nuevo -> profesion=$request->input('profesion');
  $nuevo -> telefono=$request->input('telefono');
  $nuevo -> correo=$request->input('correo');
  $nuevo -> img_usuario=$request->input('img_usuario');
  $nuevo -> activo=$request->input('activo');

  if($nuevo->save()){
    return response()->json($nuevo);
  }else{
    return response()->json("error");
  }
});





// $router->get('/equipo', function () use ($router) {
//   $integrantes = DB::table('el_equipo')->distinct('activo','fecha_creacion','usuario_creacion')->get();
//   return response()->json($integrantes);
//
// });
