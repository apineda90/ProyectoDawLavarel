<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /*Table*/
    protected $table = 'usuario';
    /*avoid these columns created_at and updated_at*/
    public $timestamps = false;
    /*Fields to fill*/
    protected $fillable = ['idusuario', 'nombres','email', 'password', 'usuario'];
    /*??*/
    protected $hidden = ['contrasena', 'remember_token'];

    public function documentos(){
        return $this->hasMany('Documento');
    }

    public static function getUserbyId($id)
    {
        $usuario = Usuario::where('idUsuario', $id)
            ->first();
        return $usuario;
    }

       /*Se retorna el nombre de un usuario.*/
    public static function getNames($id)
    {
        $usuario = Usuario::getUserbyId($id);
        if(isset($usuario))
            return $usuario->nombres;
        return -1;
    }

    public static function userExist($user)
    {
        $usuario = Usuario::where('usuario', $user)
            ->first();
        if($usuario)
            return 1;
        return 0;
    }

    	public static function getIdUser($user){
        $usu = Usuario::where('usuario', $user)
            ->first();
        return $usu->idUsuario;
    }
    /*Save is also used to update*/

}

