<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('POST')){
            return[
                'name' => 'required',
                'email' => 'required',
                'phone' => 'nullable',
                'your_message' => 'required'
            ];
        }
    }
    public function messages(): array{
        if(request()->isMethod('POST')){
            return[
                'name.required' => 'Name is Required!!',
                'email.required' => 'email is Required!!',
                'your_message.required' => 'your_message is Required!!',
            ];
        }
    }
}
