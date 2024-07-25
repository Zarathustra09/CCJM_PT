<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentStoreRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'birthdate' => 'required|date',
            'civil_status' => 'required|string|max:10',
            'selected_skills' => 'required|array|max:3',
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'government_id' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'proof_of_address' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'nbi_clearance' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'medical_cert' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'drug_test' => 'required|file|mimes:jpg,jpeg,png,pdf',
        ];
    }
}
