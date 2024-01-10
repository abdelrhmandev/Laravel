<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*
    https://dev.to/secmohammed/laravel-form-request-tips-tricks-2p12
    public function authorize()
    {
      return auth()->user()->can('update-post', $this->post);
    }
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        ///MULTI Languages Inputs Validation///////////
        foreach(\LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
            $id = $this->request->get('id_'.substr($properties['regional'],0,2)) ? ',' . $this->request->get('id_'.substr($properties['regional'],0,2)) : '';
            $rules['title_'.substr($properties['regional'],0,2)] = 'required|unique:tag_translations,title'.$id;
            $rules['slug_'.substr($properties['regional'],0,2)] = 'nullable|unique:tag_translations,slug'.$id; 
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
