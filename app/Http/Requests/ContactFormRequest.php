<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'feedbackName' => 'required|string|max:255',
            'feedbackTel' => 'required|string|max:20',
            'feedbackEmail' => 'required|email|max:255',
            'feedbackMessage' => 'required|string|max:2000'
        ];
    }

    /**
     * Get custom validation messages
     */
    public function messages(): array
    {
        return [
            'feedbackName.required' => 'Full name is required.',
            'feedbackTel.required' => 'Phone number is required.',
            'feedbackEmail.required' => 'Email address is required.',
            'feedbackEmail.email' => 'Please enter a valid email address.',
            'feedbackMessage.required' => 'Message is required.'
        ];
    }
}
