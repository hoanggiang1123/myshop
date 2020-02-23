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
    public function changeBulkActions($params, $options =null) {
       
        $type = isset($params['type'])? $params['type']:'';
        $ids = isset($params['cid'])? $params['cid']: '';
        $vals = isset($params[$type])? $params[$type]:'';
        if($type == '' || $ids == '') return; 
        switch($type) {
            case 'status':
                $val = $params['val'];
                $this->updateBulk('Status',$ids,$val);
                break; 
            case 'ishome':
                $val = $params['val'];
                $this->updateBulk('isHome',$ids,$val);
                break;
            case 'display':
                $this->updateBulk('Display',$ids,$vals);
                break;
            case 'ordering':
                $this->updateBulk('Stt',$ids,$vals);
                break;
            case 'del':
                foreach($ids as $key => $id) {
                    Category::find($id)->delete();
                }
                break;
        }
    }
    public function saveItem($params = null, $options = null) {
        if($options['task'] == 'change-ishome') {
            Category::find($params['id'])->update(['isHome' => $params['ishome']]);
        }
        if($options['task'] == 'change-status') {
            Category::find($params['id'])->update(['Status' => $params['status']]);
        }
    }
    public function deleteItem($params = null, $options = null) {
        if($options['task'] == 'delete-single') {
            Category::find($params['id'])->delete();
        }
    }
    public function updateBulk($field,$ids,$vals) {
        if(is_array($vals)) {
            foreach($ids as $key => $id) {
                Category::find($id)->update([$field => $vals[$key]]);
            }
        } else {
            foreach($ids as $key => $id) {
                Category::find($id)->update([$field => $vals]);
            }
        }
    }

}
