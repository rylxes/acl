<?php

namespace rylxes\Acl\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class AclController extends Controller
{

    public function index()
    {
        $app = app();
        $routeCollection = Route::getRoutes();


        //$routes = [];
        foreach ($routeCollection as $route) {
            echo ($route->uri . " >>" . $route->getName() . " >> " . $route->getPrefix() . " >>" . $route->getActionMethod()." >>".$route->methods['0']);
        }

        dd('f');
       // dd($routes);
    }

}
