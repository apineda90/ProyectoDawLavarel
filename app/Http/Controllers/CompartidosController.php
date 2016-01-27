<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Documento;
use App\usuario_documento;
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
              <button type="button" class="btn btn-info btn-xs" id="vol" data-target="#CompartirConfirmModal" data-toggle="modal"
              data-id="' . $user->idUsuario . '"> Agregar <i data-id="' . $user->idUsuario . '" class="glyphicon glyphicon-plus-sign"></i></button><br/>


                                </div>';
            }
            $html .= '			</div>';
            $html .= '		</div>';
            $html .= '	</h5>';

        } //Aqui arriba puse el button que contiene como data el id del usuario a agregar

        $html .= '</div>';
        return $html;
    }

    public function store(Request $req){
        session_start();
        $user = $_SESSION['nameusuario'];
        $iduser=Usuario::getIdUser($_SESSION['usuarioespol']);
        $documentos=Documento::ObtenerMisDocus($iduser);

        if(usuario_documento::userDocuExists($req->userChosen,$req->docChosen)==0) {
            $relacionUsDoc=new usuario_documento();
            $relacionUsDoc->usuario=$req->userChosen;
            $relacionUsDoc->documento=$req->docChosen;
            $relacionUsDoc->save();

            echo"<script>alert('El documento ha sido compartido con exito!! ')</script>";

            return view('principal', ['user' => $user, 'docs'=>$documentos]);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("El documento ya esta compartido con el usuario.")';
            echo '</script>';
            return view('principal', ['user' => $user, 'docs'=>$documentos]);
        }
    }

    public function stored(Request $request)
    {
        session_start();
        $html = "";
        $vecesenelgrupo=0;
        $creadormiembro=0;

        if($request->ajax()) {
            $group = Group::getGroupById( $_SESSION['group'] );
            $user = User::getUserById($request->usuario);

            $vecesenelgrupo= $group->users()->where('owner', 0)
                ->where('user_id',$user->id)
                ->where('group_id',$group->id)
                ->count();

            $creadormiembro= $group->users()->where('owner', 1)
                ->where('user_id',$user->id)
                ->where('group_id',$group->id)
                ->count();


            if($vecesenelgrupo<1 && $creadormiembro<1) {
                $group->users()->save($user, ['owner' => 0]);

                $html .= '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                          <button style="margin-left: 88%" type="button" class="btn btn-link delMem" data-botonLeaveMember="{{$members->id}}" ><i class="fa fa-remove"></i></button>
                          <img src="' . asset("img/user.png") . '" class="img-circle img-responsive" alt="owner" width="140" height="140">
                          <div class="caption">
                              <h3 style="text-align: center;">Member</h3>
                              <h4 style="text-align: center;">' . $user->full_name . '</h4>

                          </div>
                      </div>
                  </div>';
            }
            else
                if($creadormiembro>=1)
                    echo "<script type='text/javascript'>alert('You can not add yourself, you are the owner.');</script>";
                else
                    echo "<script type='text/javascript'>alert('The user is already a member of the group..');</script>";

        }
        return $html;
    }


}
