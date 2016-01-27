<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_documento extends Model
{

    protected $table = 'usuario_documento';

    public $timestamps = false;

    protected $primaryKey = 'idud';

    protected $fillable = ['usuario', 'documento'];

    public static function userDocuExists($iduser,$iddocu){
        $userdoc = usuario_documento::where('usuario', $iduser)->where('documento',$iddocu)
            ->first();
        if(isset($userdoc))
            return 1;
        return 0;
    }

    public static function ObtenerMisDocusComp($id)
    {
        $documentos = usuario_documento::where('usuario',$id)
            ->get();
        $erre=array();
        $docusComp=array();

        foreach($documentos as $doc){
            if(!Documento::EsmiDoc($doc->documento,$id))
                array_push($erre,$doc->documento);
        }
        for($i=0;$i<count($erre);$i++)
        {
            array_push($docusComp,Documento::ObtenerDocuById($erre[$i]));
        }
        return $docusComp;
    }
}

