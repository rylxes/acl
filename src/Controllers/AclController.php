<?php

namespace rylxes\Acl\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class AclController extends Controller
{

    public function index()
    {

        $employees = Collaborator::where('user_id', Auth::user()->id)
            ->with(['personalInfo'])
            ->where('flag', 'Active')->groupBy('user_id', 'client_id')->whereHas('client.roles', function ($q) {
                $q->whereIn('name', ["employee", 'employee-ims']);
            })->with('client')
            ->get();

        $data = [
            "employees" => $employees,
        ];
        //   dd($employees);
        return view("acl.employee_list", $data);

    }

    public function indexd()
    {
        $app = app();
        $routeCollection = Route::getRoutes();


        foreach (Route::getRoutes()->getIterator() as $route) {
            if (!(strpos($route->uri, 'admin/acl') !== false)) {
                $routes[] = $route->uri;
                dd($route);
            }


        }

        dd($routes);

        //$routes = [];
        foreach ($routeCollection as $route) {
            dd($route);
            echo($route->uri . " >>" . $route->getName() . " >> " . $route->getPrefix() . " >>" . $route->getActionMethod() . " >>" . $route->methods['0']);
        }

        dd('f');
        // dd($routes);
    }

}
