<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public function product() {
        return $this->belongsTo('App\Models\Product', 'Id','ProductId');
    }
    public function language() {
        return $this->belongsTo('App\Models\Language', 'Id','LanguageId');
    }
}
