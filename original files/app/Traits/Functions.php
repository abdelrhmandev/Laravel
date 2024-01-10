<?php
namespace App\Traits;
use Illuminate\Support\Str;
use LaravelLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait Functions
{


    public function dataTableGetImage($row,$route){
            $div = '<span aria-hidden="true">—</span>';
            if($row->image && File::exists(public_path($row->image))) {
            $imagePath = url(asset($row->image));
                $div = "<a href=".route($route,$row->id)." title='".$row->translate->title."'>
                <div class=\"symbol symbol-50px\"><img class=\"img-fluid\" src=".$imagePath."></div>     
                </a>";                      
        }
        return $div;       
    }

    public function dataTableGetStatus($row){
        if($row->status == 1){
            $checked = "checked";
            $statusLabel  = "<span class=\"text-success\">".__('site.published')."</span>";                                                   
        }else{
            $checked = "";
            $statusLabel  ="<span class=\"text-danger\">".__('site.unpublished')."</span>";   
        }                    
        $div = "<div class=\"form-check form-switch form-check-custom form-check-solid\"><input class=\"form-check-input UpdateStatus\" name=\"Updatetatus\" type=\"checkbox\" ".$checked." id=\"Status".$row->id."\" onclick=\"UpdateStatus($row->id,'".__($this->TRANS.'.plural')."','$this->Tbl','".route('UpdateStatus')."')\" />&nbsp;".$statusLabel."</div>";
        return $div;       
}


    public function dataTableGetCreatedat($date){

        $div = "<div class=\"font-weight-bolder text-primary mb-0\">".\Carbon\Carbon::parse($date)->format('d/m/Y').'</div><div class=\"text-muted\">'.''."</div>";
        return [                    
            'display' => $div, 
            'timestamp' => $date->timestamp
         ];
    }


    public function dataTableEditRecordAction($row,$route,$hide_edit=null){

        $editRoute = ($hide_edit == 'hide_edit') ? 'hide_edit' : route($route.'.edit',$row->id);

        return view('backend.partials.btns.edit-delete', [
            'trans'         =>$this->TRANS,                       
            'editRoute'     => $editRoute,
            'destroyRoute'  =>route($route.'.destroy',$row->id),
            'id'            =>$row->id
            ]);
    }
      



 
    public function dataTableUpdateStatus(Request $request){       
        if(DB::table($request->table)->find($request->id)){
            if(DB::table($request->table)->where('id',$request->id)->update(['status'=>$request->status])){
                $arr = array('msg' => __('site.status_updated') , 'status' => true);
            }else{
                $arr = array('msg' => 'ERROR In Update Status', 'status' => false);
            }       
            return response()->json($arr);
      }
    }
    


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

    public function str_split(string $str, int $len = 1){
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
                $dynamicRequest = $value .'_'. substr($properties['regional'], 0, 2);           
                    $ids = request()->get('id_'.substr($properties['regional'], 0, 2));               
                    $UpdatedArr = [
                        $value=>request()->get($dynamicRequest)
                    ];                     
                    DB::table($table)->where("id",$ids)->where($foreignKey)->update($UpdatedArr);
                    $updateQurey = true;
                    
            } 
        }
        return $updateQurey;        
    }
}
