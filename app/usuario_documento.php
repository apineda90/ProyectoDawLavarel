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
}

