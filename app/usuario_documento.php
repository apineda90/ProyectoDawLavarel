<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_documento extends Model
{

    protected $table = 'usuario_documento';

    public $timestamps = false;

    protected $primaryKey = 'idud';

    protected $fillable = ['usuario', 'documento'];

    
}

