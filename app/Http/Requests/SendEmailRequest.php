<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        #rules for our email request
        return [
            'senator_id' => 'required|int',
            'sender_last_name'=>'required|min:2|max:255',
            'sender_email' => 'required|email',
            'message'=> 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'senator_id.required' => 'Senator ID is required!',
            'email.required' => 'Email is required!',
            'sender_last_name.required' => 'Last name is required!',
            'message.required' => 'Message body is required!'
        ];
    }
}
