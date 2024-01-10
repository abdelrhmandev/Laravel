<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class CategoryRequest extends FormRequest
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


            $rules['title_'.substr($properties['regional'],0,2)] = 'required|unique:category_translations,title'.$id;
            $rules['slug_'.substr($properties['regional'],0,2)] = 'nullable|unique:category_translations,slug'.$id; 

 

              $rules['description_'.substr($properties['regional'],0,2)] = 'nullable|max:500'; 
        } 



        $rules['published'] = 'nullable|in:0,1'; 
        $rules['image'] =  'nullable|max:1000|mimes:jpeg,bmp,png,gif'; // max size 1 MB  
        $rules['parent_id'] = 'nullable|exists:categories,id';
        // $rules['start_date'] = 'required_with:special_price|date_format:Y-m-d';

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
