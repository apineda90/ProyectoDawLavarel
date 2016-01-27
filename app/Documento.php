<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    protected $table = 'documento';

    public $timestamps = false;

    protected $primaryKey = 'idDocumento';

    protected $fillable = ['owner', 'titulo','grafico','shared', 'fechaCreacion', 'fechaModif',];

    public static function docuExist($titulodocu,$id)
    {
        $documento = Documento::where('titulo', $titulodocu)->where('owner',$id)
            ->first();
        if(isset($documento))
            return 1;
        return 0;
    }

    public static function ObtenerMisDocus($id)
    {
        $documentos = Documento::where('owner',$id)
            ->get();
        if(isset($documentos))
            return $documentos;
        return 0;
    }

    public static function EsmiDoc($idDoc,$idusuario){
        $documento = Documento::where('owner',$idusuario)->where('idDocumento',$idDoc)->first();

        if(isset($documento))
        return true;
        else
            return false;
    }

    public static function ObtenerDocuById($id)
    {
        $documento = Documento::where('idDocumento',$id)
            ->first();
        if(isset($documento))
            return $documento;
        return 0;
    }




    function usuario(){
        return $this->belongsTo('Usuario', 'idusuario', 'idusuario');
    }

}

