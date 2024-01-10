<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class VacancyRequest extends FormRequest
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
      return auth()->user()->can('update-slider', $this->slider);
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
        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        $rules['title']         = 'required|unique:vacancies,title'.$id;
        $rules['description']   = 'nullable|max:500'; 
        $rules['status']        = 'nullable|in:0,1'; 
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
