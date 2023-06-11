<?php
namespace App\Traits;
use Illuminate\Support\Str;
use LaravelLocalization;
use App\Models\Category;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait Functions
{

  


    function getCategoryTree($parent_id = 0, $spacing = '', $tree_array = array()) {
        $categories = Category::select('id', 'parent_id')->where('parent_id' ,'=', $parent_id)->orderBy('parent_id')->get();
        foreach ($categories as $item){
            $tree_array[] = ['categoryId' => $item->id, 'categoryName' =>$spacing] ;
            $tree_array = $this->getCategoryTree($item->id, $spacing . '--', $tree_array);
        }
        return $tree_array;
    }


    function hasChild($c){

 
       $cc =  Category::where('id',$c);
        if ($cc->count() > 0) {
            return true;
        }
        return false;

    }
    
    public function dumpTree($parent, $level = 0){	
        
   
        
        $cats = Category::with('nested_descendants')->where('parent_id',$parent)->get();   
        
         
        $c = '';
        foreach ($cats AS $cat) {
            $c.='<option value="'. $cat->id .'">' . str_repeat("-", $level*2) . $cat->id .'' . "</option>"; 		
       

 
   
        if ($this->hasChild($cat->id)) { 
     
            $this->dumpTree($cat->id, $level+1);  
            
        } 
    }
        return $c;
    }
      
   
 
    
    // public function dumpTree($parent = 0, $level = 0){	

    //     $cats = Category::where('parent_id',$parent)->get();        
    //     $c = '';
    //     foreach ($cats AS $cat) {
    //         $c.='<option value="'. $cat->id .'">' . str_repeat("-", $level*2) . $cat->id . "</option>"; 		
   
    //     }
    //     return $c;
    // }
 
   


     


    public function HandleMultiLangdatabase($array,$f){
 
        $requestInputs = [];


        

 
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){                  
            

            
 
            $x = substr($properties['regional'],0,2);


            
            foreach($array as $v){


               
                $vv = substr($v,0,-1);
                $vav = $v.substr($properties['regional'],0,2);

             
                if($vv == 'slug'){
                    $requestInputs[$x]['slug'] = request()->$vav ?? Str::slug($requestInputs[$x]['title']);    
                }else{
                $requestInputs[$x][$vv] =  request()->$vav;
                $requestInputs[$x]['lang'] = substr($properties['regional'],0,2);
                $requestInputs[$x][key($f)] =   end($f);
                } 
            }
             

        }

 
        return $requestInputs;
   

    }
    
    public function str_split(string $str, int $len = 1){
        $arr		= [];
        $length 	= mb_strlen($str, 'UTF-8');    
        for ($i = 0; $i < $length; $i += $len) {    
            $arr[] = mb_substr($str, $i, $len, 'UTF-8');    
        }    
        return $arr[0];
    }

 
}
