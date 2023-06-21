<?php
namespace App\Traits;
use Illuminate\Support\Str;
use LaravelLocalization;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait Functions
{

    public function getItemtranslatedllangs($query,$ReturnCoumnArray){
        $requestInputs = [];

        $c_ = [];  
        $arr = [];
        foreach($ReturnCoumnArray as $va){     
            foreach($query->get() as $v){
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
                $Column = substr($value, 0, -1);
                $dynamicRequest = $value . substr($properties['regional'], 0, 2);
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


    public function HandleMultiLangdatabase2($array,$Tbl){
        $requestInputs = [];
        $ids = [];
        $cc=[];
        $update=[];
 
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            foreach ($array as $value) {
                $Column = substr($value, 0, -1);
                $dynamicRequest = $value . substr($properties['regional'], 0, 2);
    
 
                 if ($Column == 'id') {
                    $ids[] = request()->get($dynamicRequest);



                }else{
                    $requestInputs[$regional][$Column] = request()->get($dynamicRequest);
               
                } 
                  
                   
               
                // echo '<hr>';
                // echo '<br/>';
 
            
                }

              
             
                

                
             
        }
      



        $columnValues = [];
        foreach ($requestInputs as $kBig => $v1) {
           
            foreach ($v1 as $kSmall => $v2) {
                $columnValues[$kBig][$kSmall] = $v2;
                // echo '<br>';
            }
        }


        // $cXX = array_combine($array, $columnValues);

        // dd($cXX);

        dd($columnValues);
        echo '<pre>';
        // print_r($columnValues);

        \App\Models\CategoryTranslation::whereIn("id",$ids)->update($columnValues);


        dd();
        echo '<pre>';
        print_r($requestInputs);
  
   
  
   
   
      dd();


       echo '<pre>';
      print_r($ids);

 

 
 
    dd();
   


    // $cXXXXXXXXXXXx = array_combine($ColumnKeys, $columnValues);

        dd($columnValues);
        dd();


        \App\Models\CategoryTranslation::whereIn("id",['23','24'])
        ->update([
           'title' => $requestInputs
        ]);


        
      
        return $requestInputs;
    }
}
