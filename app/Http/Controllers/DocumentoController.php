<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;

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
        if($documento)
            return $documento->titulo;
        return -1;
    }

    public static function crearDoc($req){
        
        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $id=Usuario::getIdUser($userespol);
        $date = new DateTime;

        $documento = new Documento;
        $documento->idusuario = $id;
        $documento->titulo = $req->titulo;
        $documento->grafico = $req->grafico;
        $documento->fechaCreacion = $date->format('m-d-y H:i:s');
        $documento->fechaModif = $date->format('m-d-y H:i:s');
        $documento->save();
    }

    public static function modificarDoc($req){
        $date = new DateTime;
        Documento::where('idDocumento', $req->idDocumento)->update([
          'titulo' => $req->titulo,
          'grafico' => $req->grafico,
          'fechaCreacion' => $req->fechaCreacion,
          'fechaModif' => $date->format('m-d-y H:i:s')
        ]);
    }

    public function eliminarDoc($req){
        Documento::where('idDocumento', $req->idDocumento)->delete();
    }


}

