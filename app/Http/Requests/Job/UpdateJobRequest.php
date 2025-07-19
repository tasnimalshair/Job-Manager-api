<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'title' => ['sometimes', 'required', 'string', 'max:50'],
            'description' => ['sometimes', 'required', 'string', 'min:15', 'max:250'],
            'company' => ['sometimes', 'required', 'string'],
            'location' => ['sometimes', 'required', 'in:On-site,Remote'],
            'type' => ['sometimes', 'required', 'in:Full-time,Part-time'],
            'deadline' => ['sometimes', 'required', 'date'],
            'salary' => ['sometimes', 'required', 'numeric'],
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],
            // 'created_by' => ['sometimes', 'required', 'exists:users,id']

        ];
    }
}
