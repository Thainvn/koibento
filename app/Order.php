<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function Order_Detail(){
    	return $this->hasMany("App\Order_Detail","order_id","id");
    }
    public function Customer(){
    	return $this->belongsTo("App\Customer","customer_id","id");
    }
}
