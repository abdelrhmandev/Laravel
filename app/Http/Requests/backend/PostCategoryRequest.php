<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class PostCategoryRequest extends FormRequest
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
        ////////////////
        foreach(\LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
              $rules['title_'.substr($properties['regional'],0,2)] = 'required'; 
        } 
            return $rules; 
    }

 


 
    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'status'   => false,
    //         'msg'      => $validator->errors()
    //     ]));
    // }
    
}
