<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioGit extends Model
{
     protected $table = 'usuario_git';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['github_id','name', 'email','avatar',];

    public function documentos(){
        return $this->hasMany('Documento');
    }

}

