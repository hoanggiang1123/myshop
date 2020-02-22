<?php
namespace App\Helper;
use Config;

class Template {

    public static function showItemThumb($controllerName,$thumbName,$thumbAlt) {
        $html = sprintf('<img src="%s" title="%s" alt="%s" class="myshop-thumb"/>',asset('Images/'.$controllerName.'/'.$thumbName),$thumbAlt,$thumbAlt);
        return $html;
    }
    public static function showButtonAction($controllerName,$id) {
        $templateBtn = Config::get('mycf.template.button');
        $configBtn = Config::get('mycf.config.button');
        $controllerName = (array_key_exists($controllerName,$configBtn))? $controllerName: 'default';
        $listBtn = $configBtn[$controllerName];
        $html = '';
        foreach($listBtn as $btn) {
            $currentBtn = $templateBtn[$btn];
            $link = route($controllerName.$currentBtn['route-name'],['id'=>$id]);
            $html.= sprintf('<a href="%s" class="%s">%s</a>',$link,$currentBtn['class'],$currentBtn['title']);
        }
        return $html;
    }
    public static function showIsHome($controllerName,$isHome,$id) {
        $templateIsHome = Config::get('mycf.template.is_home');
        $isHome = (array_key_exists($isHome,$templateIsHome)) ? $isHome: 'yes';
        $currentIsHome = $templateIsHome[$isHome];
        $isHome = ($isHome == 'yes') ? 'no': 'yes';
        $link = route($controllerName.'/showhome',['status'=>$isHome,'id'=>$id]);
        
        return sprintf('<a href="%s" class="%s">%s</a><input class="ishome commom" type="hidden" value="%s" />',$link, $currentIsHome['class'], $currentIsHome['name'],$isHome);
    }
    public static function showSelectDisplay($controllerName,$display,$id,$fieldName) {
        $link = route($controllerName.'/'.$fieldName,[$fieldName=>'new_value','id'=>$id]);
        $templateSelectDisplay = Config::get('mycf.template.'.$fieldName);
        $display = (array_key_exists($display,$templateSelectDisplay)) ? $display: 'list';
        $html = sprintf('<div class="form-group"><select class="form-control display commom"  data-url="%s">', $link);

        foreach($templateSelectDisplay as $key => $dp) {
            $selected = '';
            if($key == $display) $selected = 'selected="selected"';

            $html.= sprintf('<option value="%s" %s> %s </option>',$key,$selected,$dp['name']);
        }
        $html.='</select></div>';
        return $html;
    }
    public static function showStatusButton($controllerName,$status,$id) {
        $templateStatusBtn = Config::get('mycf.template.status');
        $displayStatus = (array_key_exists($status,$templateStatusBtn)) ? $status: 'active';
        $currentStatus =  $templateStatusBtn[$displayStatus];

        $status = ($status == 'active') ? 'inactive': 'active';
        $link = route($controllerName.'/status',['status'=>$status,'id'=>$id]);
        return sprintf('<a href="%s" class="%s" >%s</a><input class="status commom" type="hidden" value="%s" />', $link, $currentStatus['class'], $currentStatus['name'],$status);
        
    }
    public static function showItemHistory($by,$time) {
        if($by == null) {
            return sprintf('<p><i class="fa fa-clock-o"></i> %s</p>', date(Config::get('mycf.format.short_time'), strtotime($time)));
        } else {
            return sprintf('<p><i class="fa fa-user"></i> %s</p><p><i class="fa fa-clock-o"></i> %s</p>', $by, date(Config::get('mycf.format.short_time'), strtotime($time)));
        }
    }
    public static function showItemOrdering($val,$id) {
        return sprintf('<div class="form-group">
        <input  id="ordering%s" value="%s" class="form-control ordering commom"/>
        </div>',$id,$val);
    }
    public static function showItemCheckbox($id) {
        return sprintf(' <div class="icheck-primary">
        <input type="checkbox" value="%s" name="cid[]" id="check%s" class="cball">
        <label for="check%s"></label>
        </div>', $id,$id,$id);
    }
}
