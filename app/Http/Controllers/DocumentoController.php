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



class DocumentoController extends Controller {

    public static function getDocById($id) {
        $documento = Documento::where('idDocumento', $id)
            ->first();
        return $documento;
    }
    
    public static function getDocsByIdUser($id) {   
        $documentos = Documento::where('idusuario', $id)
            ->first();
        return $documentos;
    }

    public static function getDocTitulo($id) {
        $documento = Documento::getDocById($id);
        if(isset($documento))
            return $documento->titulo;
        return -1;
    }

    public static function crearDoc(Request $req){

        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $id=Usuario::getIdUser($userespol);
        
        $titulo = $req->fileToSave;
        $innerhtml = $req->getHTML;
        $date = date('Y/m/d H:i:s');
    
        $documento = new Documento;
        $documento->idusuario = 3;
        $documento->titulo = $titulo;  
        $documento->grafico = $innerhtml;   
        $documento->fechaCreacion = $date;
        $documento->fechaModif = $date;

        $documento->save();
        return Redirect::back()->withMessage('Documento guardado');
    }


    public static function modificarDoc(Request $req, $id){
        $date = new DateTime;
        Documento::where('idDocumento', $id)->update([
          'titulo' => $req->titulo,
          'grafico' => $req->grafico,
          'fechaCreacion' => $req->fechaCreacion,
          'fechaModif' => $date->format('m-d-y H:i:s')
        ]);
    }

    public function eliminarDoc($id){
        Documento::where('idDocumento', $id)->delete();
    }


}

