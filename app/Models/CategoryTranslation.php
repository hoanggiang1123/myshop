<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public function category() {
        return $this->belongsTo('App\Models\Category','Id','CategoryId');
    }
    public function language() {
        return $this->belongsTo('App\Models\Language','Id','LanguageId');
    }
}
