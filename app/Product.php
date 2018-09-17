<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function Category(){

    	return $this->belongsTo("App\Category","category_id","id");
    }

    public function Order_Detail(){
    	
    	return $this->hasMany("App\Order_Detail","product_id","id");
    }

}
