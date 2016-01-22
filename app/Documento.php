<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    protected $table = 'documento';

    public $timestamps = false;

    protected $primaryKey = 'idDocumento';

    protected $fillable = ['idusuario', 'titulo','grafico', 'fechaCreacion', 'fechaModif'];

    function usuario(){
        return $this->belongsTo('Usuario', 'idusuario', 'idusuario');
    }

}

