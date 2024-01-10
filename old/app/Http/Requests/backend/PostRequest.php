<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class PostRequest extends FormRequest
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
            $rules['title_'.substr($properties['regional'],0,2)] = 'required|unique:post_translations,title'.$id;
            $rules['slug_'.substr($properties['regional'],0,2)] = 'nullable|unique:post_translations,slug'.$id; 
            $rules['description_'.substr($properties['regional'],0,2)] = 'nullable|max:500'; 
        } 



        $rules['status']      = 'nullable|in:0,1'; 
        $rules['allow_comments'] = 'nullable|in:0,1';
        $rules['featured']       = 'nullable|in:0,1'; 

        $rules['image'] =  'nullable|max:1000|mimes:jpeg,bmp,png,gif'; // max size 1 MB  


        $rules['user_id'] =  'exists:users,id';   
       

        $rules['gallery.*'] =  'nullable|max:1000|mimes:jpeg,bmp,png,gif'; // max size 1 MB  



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
