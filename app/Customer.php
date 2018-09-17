<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";

   

    public function Order(){
    	return $this->belongsTo("App\Order","customer_id","id");
    }
}
