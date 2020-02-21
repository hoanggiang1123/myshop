<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function categoryTranslations() {
        return $this->hasMany('App\Models\CategoryTranslation','LanguageId','Id');
    }
    public function productTranslations() {
        return $this->hasMany('App\Models\ProductTranslation','LanguageId','Id');
    }
}
