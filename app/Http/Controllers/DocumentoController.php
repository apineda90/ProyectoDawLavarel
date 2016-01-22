<?php

namespace App\Http\Controllers;

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

    public static function crearDoc(Request $req){ //si datos vienen de una vista (form) usas una variable de tipo Request, hay q poner tipo de dato
        
        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $id=Usuario::getIdUser($userespol);
        $date = new DateTime;

        $documento = new Documento;
        $documento->idusuario = $id;
        $documento->titulo = $req->fileToSave;  //Aqui debe seguir el patron = tabla->campo=$req->(nombre del input o elemento html)
        $documento->grafico = $req->grafico;    //tambien se puede poner tabla->campo=cualquir cosa
        $documento->fechaCreacion = $date->format('m-d-y H:i:s');
        $documento->fechaModif = $date->format('m-d-y H:i:s');
        $documento->save();
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
        //Documento::where('idDocumento', $req->idDocumento)->delete(); es valido cuando req es un objeto
        Documento::where('idDocumento', $id)->delete();
    }


}

