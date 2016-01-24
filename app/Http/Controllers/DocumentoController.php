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
            $_SESSION['documento'] = $documento->idDocumento;
            //return Redirect::back()->withMessage('Documento guardado');
            return view('nuevo', ['doc' => $documento, 'user' => $user, 'title' => $documento->titulo]);

        }

        else
            echo '<script language="javascript">';
            echo 'alert("Ya existe un documento con el mismo nombre.")';
            echo '</script>';
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

        if(isset($_SESSION['documento'])){
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
        else{
            echo '<script language="javascript">';
            echo 'alert("No ha creado un documento")';
            echo '</script>';
            return view('nuevo', ['user' => $user]);
        }
 
    }

	public static function cargarDesdePrincipal(Request $req){

        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $user=$_SESSION['nameusuario'];
        $id=Usuario::getIdUser($userespol);

        $documento = Documento::where('owner', $id)->where('titulo', $req->fileToLoad)->first();
        $_SESSION['documento'] = $documento->idDocumento;
        //return Redirect::back()->withMessage('Documento cargado')->with('doc', $documento);
        return view('nuevo', ['doc' => $documento,'user'=>$user ,'title'=>$req->fileToLoad]);
    }

    public function eliminarDoc(Request $req){

        Documento::where('idDocumento', $req->fileToDel)->delete();
        session_start();
        $user = $_SESSION['nameusuario'];
        $iduser=Usuario::getIdUser($_SESSION['usuarioespol']);
        $documentos=Documento::ObtenerMisDocus($iduser);
        return view('principal', ['user' => $user, 'docs'=>$documentos]);
    }


}

