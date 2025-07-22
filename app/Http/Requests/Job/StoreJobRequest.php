<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'min:15', 'max:250'],
            'company' => ['required', 'string'],
            'location' => ['required', 'string', 'in:On-site,Remote'],
            'type' => ['required', 'string', 'in:Full-time,Part-time'],
            'deadline' => ['required', 'date'],
            'salary' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'created_by' => ['required', 'exists:users,id'],
            'status' => ['required', 'in:active,inactive,closed'],
        ];
    }
}
