<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true;
    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')){
            return [
                'name' => 'required|string|max:258',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
                'cook_time' => 'required|string',
                'populatiy' => 'required|string'
            ];
        }
        else{
            return [
                'name' => 'required|string|max:258',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
                'cook_time' => 'required|string',
                'populatiy' => 'required|string'
            ];
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'name.required' => 'Name is Required!!',
                'image.required' => 'image is Required!!',
                'description.required' => 'description is Required!!',
                'cook_time.required' => 'cook_time is Required!!',
                'populatiy' => 'populatiy is Required!!',
            ];
        }else{
            return [
                'name.required' => 'Name is Required!!',
                'description.required' => 'description is Required!!',
                'cook_time.required' => 'cook_time is Required!!',
                'populatiy' => 'populatiy is Required!!',
            ];
        }

    }
}
