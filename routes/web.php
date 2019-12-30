<?php
use App\Models\Usuario;
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
return response()->json('BACKEND RAN SUCCESSFULLY');
//return $router->app->version();
});
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
