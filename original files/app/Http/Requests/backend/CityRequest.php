<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class CityRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        foreach(\LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
            $id = $this->request->get('id_'.substr($properties['regional'],0,2)) ? ',' . $this->request->get('id_'.substr($properties['regional'],0,2)) : '';
            $rules['title_'.substr($properties['regional'],0,2)] = 'required|unique:city_translations,title'.$id;
            $rules['slug_'.substr($properties['regional'],0,2)] = 'unique:city_translations,slug'.$id;
        } 
            $rules['country_id'] =  'exists:countries,id';   
        return $rules; 
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status'   => 'RequestValidation',
            'msg'      => $validator->errors()
        ]));
    }    
}
