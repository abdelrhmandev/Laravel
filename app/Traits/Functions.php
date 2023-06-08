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

<<<<<<< HEAD
 
=======

    function getCategoryTree($parent_id = 0, $spacing = '', $tree_array = array()) {
        $categories = Category::select('id', 'parent_id')->where('parent_id' ,'=', $parent_id)->orderBy('parent_id')->get();
        foreach ($categories as $item){
            $tree_array[] = ['categoryId' => $item->id, 'categoryName' =>$spacing] ;
            $tree_array = $this->getCategoryTree($item->id, $spacing . '--', $tree_array);
        }
        return $tree_array;
    }
>>>>>>> 2fdf09f8be045c7d71ccca98e0c0457074c2f648


    function hasChild($cccccccccccccc){

        // $cc = Category::where('id',$cccccccccccccc)->count();  

        if ($cccccccccccccc > 0) {
            return true;
        }
        return false;

    }
    
    public function dumpTree($parent = null, $level = 0){	
        
   
        
        $cats = Category::whereNull('parent_id')->with('childrenCategories')->where('parent_id',$parent)->get();      
        $c = '';
        foreach ($cats AS $cat) {
            $c.='<option value="'. $cat->id .'">' . str_repeat("-", $level*2) . $cat->id .'<-------->'. $cat->id . "</option>"; 		
         
         
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
 
   


    public function displayAsideMenuItem($transFile,$Route){
        $html = '<span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/communication/com004.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M14 3V20H2V3C2 2.4 2.4 2 3 2H13C13.6 2 14 2.4 14 3ZM11 13V11C11 9.7 10.2 8.59995 9 8.19995V7C9 6.4 8.6 6 8 6C7.4 6 7 6.4 7 7V8.19995C5.8 8.59995 5 9.7 5 11V13C5 13.6 4.6 14 4 14V15C4 15.6 4.4 16 5 16H11C11.6 16 12 15.6 12 15V14C11.4 14 11 13.6 11 13Z" fill="currentColor" />
                    <path d="M2 20H14V21C14 21.6 13.6 22 13 22H3C2.4 22 2 21.6 2 21V20ZM9 3V2H7V3C7 3.6 7.4 4 8 4C8.6 4 9 3.6 9 3ZM6.5 16C6.5 16.8 7.2 17.5 8 17.5C8.8 17.5 9.5 16.8 9.5 16H6.5ZM21.7 12C21.7 11.4 21.3 11 20.7 11H17.6C17 11 16.6 11.4 16.6 12C16.6 12.6 17 13 17.6 13H20.7C21.2 13 21.7 12.6 21.7 12ZM17 8C16.6 8 16.2 7.80002 16.1 7.40002C15.9 6.90002 16.1 6.29998 16.6 6.09998L19.1 5C19.6 4.8 20.2 5 20.4 5.5C20.6 6 20.4 6.60005 19.9 6.80005L17.4 7.90002C17.3 8.00002 17.1 8 17 8ZM19.5 19.1C19.4 19.1 19.2 19.1 19.1 19L16.6 17.9C16.1 17.7 15.9 17.1 16.1 16.6C16.3 16.1 16.9 15.9 17.4 16.1L19.9 17.2C20.4 17.4 20.6 18 20.4 18.5C20.2 18.9 19.9 19.1 19.5 19.1Z" fill="currentColor" />
                </svg>
            </span>
           
        </span><span class="menu-title">asdsad</span>
        <span class="menu-arrow"></span>
    </span>


    <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="sadasd">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">asdasds</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="sdas">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">dsadsad</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>';

                            return $html;


    }


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
