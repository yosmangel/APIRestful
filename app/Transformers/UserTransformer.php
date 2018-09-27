<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'identificador'=>(int)$user->id,
            'nombre'=>(string)$user->name,
            'correo'=>(string)$user->email,
            'esVerificado'=>(int)$user->verified,
            'esAdministrador'=>($user->admin==='true'),
            'fechaCreacion'=>(string)$user->created_at,
            'fechaActualizacion'=>(string)$user->updated_at,
            'FechaEliminacion'=>isset($user->deleted_at) ? (string) $user->deleted_at : null,
        ];
    }

    public static function originalAttribute($index){
        
        $attributes=[
            'identificador'=>'id',
            'nombre'=>'name',
            'correo'=>'email',
            'esVerificado'=>'verified',
            'esAdministrador'=>'admin',
            'fechaCreacion'=>'created_at',
            'fechaActualizacion'=>'updated_at',
            'FechaEliminacion'=>'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    } 

    public static function transformAttribute($index){
        
        $attributes=[
            'id'=>'identificador',
            'name'=>'nombre',
            'email'=>'correo',
            'verified'=>'esVerificado',
            'admin'=>'esAdministrador',
            'created_at'=>'fechaCreacion',
            'updated_at'=>'fechaActualizacion',
            'deleted_at'=>'FechaEliminacion',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    } 
}
