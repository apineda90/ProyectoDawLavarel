<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Documento;
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

    public static function search(Request $request)
    {
        $html = '';

        $users = Usuario::members($request->agregarMiembro)->get();

        $id = $request->editEvent == 0 ? "grupo":"members";

        $html .= '<div class="list-group" id="'.$id.'">';
        $html .= '	<a href="#" class="list-group-item list-group-item-' . ($users->isEmpty() ? 'danger' : 'success') . '"><span class="badge">' . $users->count() . '</span><i class="fa fa-user"></i> Usuarios</a>';

        foreach ($users as $user) {
            $html .= '		<div>';

            $html .= '	<h5 class="list-group-item usergroup" >';

            $html .= '			<div class="media-body">';
            $html .= '				<strong> '.'&nbsp;&nbsp;' . $user->nombres . '</strong>';
            $html .= '				<div> ' . '&nbsp;&nbsp;&nbsp;&nbsp;'. $user->usuario . '</div>';

            if( strcmp($id,"members") == 0 ){
                $html .= '         <div class="media-right">
              <button type="button" class="btn btn-info btn-xs" data-id="' . $user->email . '"> Add <i data-id="' . $user->email . '" class="glyphicon glyphicon-plus-sign"></i></button><br/>
                                </div>';
            }else{
                $html .= '         <div class="media-right">
              <button type="button" class="btn btn-info btn-xs" data-id="' . $user->idUsuario . '"> Add <i data-id="' . $user->idUsuario . '" class="glyphicon glyphicon-plus-sign"></i></button><br/>


                                </div>';
            }
            $html .= '			</div>';
            $html .= '		</div>';
            $html .= '	</h5>';

        } //Aqui arriba puse el button que contiene como data el id del usuario a agregar

        $html .= '</div>';
        return $html;
    }




}
