<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grafico extends Model
{

    protected $table = 'grafico';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['x', 'y'];

}

