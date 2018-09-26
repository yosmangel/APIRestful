<?php

namespace App;

use App\Seller;
use App\Category;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\ProductTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
	const PRODUCTO_DISPONIBLE='disponible';
	const PRODUCTO_NO_DISPONIBLE='no disponible';
    
    public $transformer= ProductTransformer::class;

    protected $fillable=['name', 'description', 'quantity', 'status', 'image', 'seller_id'];
    protected $dates=['deleted_at'];

    protected $hidden=['pivot'];
    
    public function estaDisponible(){
    	return $this->status == Product::PRODUCTO_DISPONIBLE;
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function seller(){
    	return $this->belongsTo(Seller::class);
    }

    public function transaction(){
    	return $this->hasMany(Transaction::class);
    }
}
