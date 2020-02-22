<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ['Display','Name','Status','Stt','isHome'];
    protected $primaryKey = 'Id';
    public function __construct()
    {
        
    }
    public function products() {
        return $this->hasMany('App\Models\Product','CategoryId','Id');
    }
    public function categoryTranslations() {
        return $this->hasMany('App\Models\CategoryTranslation','CategoryId','Id');
    }

    public function listItem($params = null, $options = null) {
        
        $result = null;
        if($options['task'] == 'admin-list-item') {
            $result = Category::all();
        }
        return $result;
    }
}
