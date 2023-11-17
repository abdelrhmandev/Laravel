<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class FaqRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    /*
    https://dev.to/secmohammed/laravel-form-request-tips-tricks-2p12
    public function authorize()
    {
      return auth()->user()->can('update-Page', $this->Page);
    }
     */

    public function rules(){
        ///MULTI Languages Inputs Validation///////////
        foreach(\LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
            $id = $this->request->get('id_'.substr($properties['regional'],0,2)) ? ',' . $this->request->get('id_'.substr($properties['regional'],0,2)) : '';
            $rules['question_'.substr($properties['regional'],0,2)] = 'required|unique:faq_translations,question'.$id;
            $rules['answer_'.substr($properties['regional'],0,2)] = 'nullable|unique:faq_translations,answer'.$id; 
        } 
        return $rules; 
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => 'RequestValidation',
            'msg'      => $validator->errors()
        ]));
    }
    
}
