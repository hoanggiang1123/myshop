<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    public function productTranslations() {
        return $this->hasMany('App\Models\ProductTranslation', 'ProductId','Id');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category','Id','CategoryId');
    }
    
}
