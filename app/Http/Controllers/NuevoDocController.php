<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\WebService\WebService;



class NuevoDocController extends Controller
{

   
    public function indexNuevoDoc()
    {
        session_start();

        if(isset($_SESSION['nameusuario'])) {
            $user = $_SESSION['nameusuario'];
            return view('nuevo', ['user' => $user]);
        }
        else
            return view ('welcome');

    }






}
