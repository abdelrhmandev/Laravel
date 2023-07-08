<?php
namespace App\Traits;
use Illuminate\Support\Str;
use LaravelLocalization;
use Illuminate\Support\Facades\DB;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait Functions
{

    public function getItemtranslatedllangs($Object,$ReturnCoumnArray,$Fkey){     
        $arr = [];
                foreach($Object->translate('getAll')->where($Fkey,$Object->id)->get() as $v){
                    foreach($ReturnCoumnArray as $va){     
                        $arr['id_'.$v->lang] =  $v->id;
                        $arr[$va.'_'.$v->lang] =  $v->$va;
                    }
                }                
        return $arr;
    }

    public function HandleMultiLangdatabase($array, $f=null){
        $requestInputs = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            foreach ($array as $value) {
                $Column = $value;
                $dynamicRequest = $value .'_'. substr($properties['regional'], 0, 2);
                if ($Column == 'slug') {
                    $requestInputs[$regional]['slug'] = request()->get($dynamicRequest) ?? Str::slug($requestInputs[$regional]['title']);
                } else {
                    $requestInputs[$regional][$Column] = request()->get($dynamicRequest);
                    $requestInputs[$regional]['lang'] = substr($properties['regional'], 0, 2);
                    if(isset($f)){
                        $requestInputs[$regional][key($f)] = end($f);
                    }
                }
            }
        }
        return $requestInputs;
    }

    public function str_split(string $str, int $len = 1)
    {
        $arr = [];
        $length = mb_strlen($str, 'UTF-8');
        for ($i = 0; $i < $length; $i += $len) {
            $arr[] = mb_substr($str, $i, $len, 'UTF-8');
        }
        return $arr[0];
    }


    public function UpdateMultiLangsQuery($array,$table,$foreignKey){
        $updateQurey = false;
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            foreach ($array as $value) {
                $Column = substr($value, 0, -1);
                $dynamicRequest = $value . substr($properties['regional'], 0, 2);                
                    $ids = request()->get('id_'.substr($properties['regional'], 0, 2));               
                    $UpdatedArr = [
                        substr($value, 0, -1)=>request()->get($dynamicRequest)
                    ];

                    DB::table($table)->where("id",$ids)->where($foreignKey)->update($UpdatedArr);
                    $updateQurey = true;
                    
            } 
        }
        return $updateQurey;        
    }
}
