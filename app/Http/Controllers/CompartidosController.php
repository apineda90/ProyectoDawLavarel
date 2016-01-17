<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\WebService\WebService;



class CompartidosController extends Controller
{

   
    public function indexCompartidos()
    {
        session_start();

        if(isset($_SESSION['nameusuario'])) {
            $user = $_SESSION['nameusuario'];
            return view('compartidos', ['user' => $user]);
        }
        else
            return view ('welcome');
    }






}
