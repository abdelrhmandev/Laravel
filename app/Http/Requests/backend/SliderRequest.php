<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class SliderRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        ///MULTI Languages Inputs Validation///////////
        foreach(\LaravelLocalization::getSupportedLocales() as $localeCode => $properties){           
            $id = $this->request->get('id_'.substr($properties['regional'],0,2)) ? ',' . $this->request->get('id_'.substr($properties['regional'],0,2)) : '';            
            $rules['title_'.substr($properties['regional'],0,2)] = 'required|unique:slider_translations,title'.$id;
            $rules['description_'.substr($properties['regional'],0,2)] = 'nullable|max:500'; 
        } 
        $rules['featured']       = 'nullable|in:0,1';        
        $required                =  ($this->request->get('id_'.substr($properties['regional'],0,2))) ? '' : 'required';
        $rules['image']          =  $required.'|max:1000|mimes:jpeg,bmp,png,gif'; // max size 1 MB  
        return $rules; 
    } 
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status'   => 'RequestValidation',
            'msg'      => $validator->errors()
        ]));
    }
    
}