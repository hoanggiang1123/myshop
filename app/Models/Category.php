<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
        return $this->hasMany('App\Models\Product','CategoryId','Id');
    }
    public function categoryTranslations() {
        return $this->hasMany('App\Models\CategoryTranslation','CategoryId','Id');
    }
}
