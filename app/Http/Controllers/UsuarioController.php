<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use App\Usuario;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\WebService\WebService;



class UsuarioController extends Controller
{

    public static function loginEspol(Request $req){
        $contrasenaValida = -1;
        $servicio = new WebService();
        $matricula = $servicio->consultarCodigo($req->username);
        $contrasenaValida = $servicio->getAutentication($req->username,$req->passwordLog);

        if ($matricula == -1) { //Si usuario no existe en espol

            //dd('No existe ese usuario registrado en Espol');
            $mensajeError='No existe ese usuario registrado en Espol';
            return view('error',['error'=>$mensajeError]);

        }


        if(Usuario::userExist(strtolower($req->username))==0) {
            //dd('Existe dentro de Espol, pero no está registrado');
            $mensajeError = 'El usuario existe en Espol, pero no está registrado';
            return view('error', ['error' => $mensajeError]);

        }

        if ($contrasenaValida== -1 and $matricula != -1) {

            //dd('La contraseña es incorrecta');
            $mensajeError='Contraseña Incorrecta :v';
            return view('error',['error'=>$mensajeError]);
        }


        $info = $servicio->getDatosUser($matricula);

        $ncompleto=$info['nombre'];

        session_start();

        $_SESSION['nameusuario'] = $ncompleto;
        $_SESSION['usuarioespol']=strtolower($req->username);
        $iduser=Usuario::getIdUser($_SESSION['usuarioespol']);
        $documentos=Documento::ObtenerMisDocus($iduser);

        return view( 'principal' , [ 'user' => $ncompleto,'docs'=>$documentos]);

    }

    public function login(Request $req){

        session_start();
        $contrasena = "";
        $usuario = Usuario::where('usuario', $req->username)
            ->first();

        $_SESSION['nombres'] = $usuario->nombres;


        if(isset($usuario))
        {
            $contrasena = Crypt::decrypt($usuario->password);

            if($contrasena != $req->passwordLog)
                $usuario = null;
        }


        if(isset($usuario))
        {
            $_SESSION['key'] = $usuario->id;

            return view( 'principal' , [ 'user' => $usuario->nombres ] );
        }

        return view('welcome');
    }

    public static function logout(){
        session_start();
        session_unset();

        return redirect('/');

    }


    public function index()
    {
        session_start();

        if(isset($_SESSION['nameusuario']))
        {
            $user = $_SESSION['nameusuario'];
            $iduser=Usuario::getIdUser($_SESSION['usuarioespol']);
            $documentos=Documento::ObtenerMisDocus($iduser);
            return view('principal', ['user' => $user, 'docs'=>$documentos]);
        }
        else
            return view ('welcome');
    }

    public function indexPerfil()
    {
        session_start();

        if(isset($_SESSION['nameusuario'])) {
            $user = $_SESSION['nameusuario'];
            $userespol=$_SESSION['usuarioespol'];

            $id=Usuario::getIdUser($userespol);

            $DatoUsuarioBase=Usuario::getUserbyId($id);

            $infor=array($user,$userespol);
            return view('perfil', ['user' => $infor,'datoUsuario' => $DatoUsuarioBase]);
        }
        else
            return view ('welcome');
    }


    public function guardar(Request $req)
    {
        $contrasenaValida = -1;
        $servicio = new WebService();
        $matricula = $servicio->consultarCodigo($req->username);
        $contrasenaValida = $servicio->getAutentication($req->username,$req->passwordRegistro);

        if ($matricula == -1) { //Si usuario no existe en espol

            $mensajeError='No existe ese usuario registrado en Espol';
            return view('error',['error'=>$mensajeError]);

        }


        if ($contrasenaValida== -1 and $matricula != -1) {

            $mensajeError='Contraseña Incorrecta :v';
            return view('error',['error'=>$mensajeError]);
        }


        $info = $servicio->getDatosUser($matricula);

        $ncompleto=$info['nombre'];


        if(Usuario::userExist(strtolower($req->username))==0 and $contrasenaValida==1) {

            $usuario = new Usuario;
            $usuario->nombres =$ncompleto;
            $usuario->email = $req->emailReg;
            $usuario->usuario = strtolower($req->username);
            $usuario->edad=$req->edadReg;
            $usuario->save();
        }

        return view("welcome");
    }







}

