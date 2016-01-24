<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Documento;
use App\Usuario; // Si se va a usar funciones de otro modelo se lo incluye aqui
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\WebService\WebService;
use DateTime;
use DateTimeZone;


class DocumentoController extends Controller {

    public static function getDocById($id) {
        $documento = Documento::where('idDocumento', $id)
            ->first();
        return $documento;
    }
    
    public static function getDocsByIdUser($id) {   
        $documentos = Documento::where('idusuario', $id)
            ->get();
        return $documentos;
    }

    public static function getDocTitulo($id) {
        $documento = Documento::getDocById($id);
        if(isset($documento))
            return $documento->titulo;
        return -1;
    }

    public static function getDocByTitulo(Request $req){
        $documento = Documento::where('titulo', $req->fileToLoad)
            ->first();
        if(isset($documento))
            return $documento;
        return -1;
    }

    public static function crearDoc(Request $req){

        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $user=$_SESSION['nameusuario'];
        $id=Usuario::getIdUser($userespol);
        
        $titulo = $req->fileToSave;
        $innerhtml = $req->getHTML;
        $date = new DateTime;
        $gye_time = new DateTimeZone('America/Guayaquil');
        $date->setTimezone($gye_time);
        $date->format('m-d-y H:i:s');

        if(Documento::docuExist($titulo,$id)==0) {
            $documento = new Documento;
            $documento->owner = $id;
            $documento->titulo = $titulo;
            $documento->grafico = $innerhtml;
            $documento->fechaCreacion = $date;
            $documento->fechaModif = $date;

            $documento->save();

            //return Redirect::back()->withMessage('Documento guardado');
            return view('nuevo', ['doc' => $documento, 'user' => $user, 'title' => $documento->titulo]);

        }

        else
            dd('Ya tiene un documento con ese nombre');
        return view('nuevo', ['user' => $user]);

    }

    public static function cargarDoc(Request $req){
        session_start();

        $userespol=$_SESSION['usuarioespol'];
        $user=$_SESSION['nameusuario'];
        $id=Usuario::getIdUser($userespol);

        $documento = Documento::where('owner', $id)->where('titulo', $req->fileToLoad)->first();
        if(!empty($documento)){
            $_SESSION['documento'] = $documento->idDocumento;
        }
        return view('nuevo', ['doc' => $documento, 'user' => $user, 'title' => $documento->titulo]);
    }


    public static function modificarDoc(Request $req){
        session_start();

        $userespol=$_SESSION['usuarioespol'];
        $user=$_SESSION['nameusuario'];
        $id=Usuario::getIdUser($userespol);

        $date = new DateTime;
        $gye_time = new DateTimeZone('America/Guayaquil');
        $date->setTimezone($gye_time);
        $date->format('m-d-y H:i:s');
        $idDocumento = $_SESSION['documento'];
        $innerhtml = $req->getHTMLMod;

        Documento::where('idDocumento', $idDocumento)->first()->update([
          'grafico' => $innerhtml,
          'fechaModif' => $date
        ]);

        $documento = Documento::where('idDocumento', $idDocumento)->first();

        return view('nuevo', ['doc' => $documento, 'user' => $user, 'title' => $documento->titulo]);
    }

	public static function cargarDesdePrincipal(Request $req){

        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $user=$_SESSION['nameusuario'];
        $id=Usuario::getIdUser($userespol);

        $documento = Documento::where('owner', $id)->where('titulo', $req->fileToLoad)->first();

        //return Redirect::back()->withMessage('Documento cargado')->with('doc', $documento);
        return view('nuevo', ['doc' => $documento,'user'=>$user]);
    }

    public function eliminarDoc($id){
        Documento::where('idDocumento', $id)->first()->delete();
    }


}

