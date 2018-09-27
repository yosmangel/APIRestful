<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Transaction $transaction)
    {
        return [
            'identificador'=>(int)$transaction->id,
            'cantidad'=>(int)$transaction->quantity,
            'comprador'=>(int)$transaction->buyer_id,
            'producto'=>(int)$transaction->product_id,
            'fechaCreacion'=>(string)$transaction->created_at,
            'fechaActualizacion'=>(string)$transaction->updated_at,
            'FechaEliminacion'=>isset($transaction->deleted_at) ? (string) $transaction->deleted_at : null,
        ];
    }

    public static function originalAttribute($index){
        
        $attributes=[
            'identificador'=>'id',
            'cantidad'=>'quantity',
            'comprador'=>'buyer_id',
            'producto'=>'product_id',
            'fechaCreacion'=>'created_at',
            'fechaActualizacion'=>'updated_at',
            'FechaEliminacion'=>'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    } 

    public static function transformAttribute($index){
        
        $attributes=[
            'id'=>'identificador',
            'quantity'=>'cantidad',
            'buyer_id'=>'comprador',
            'product_id'=>'producto',
            'created_at'=>'fechaCreacion',
            'updated_at'=>'fechaActualizacion',
            'deleted_at'=>'FechaEliminacion',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
