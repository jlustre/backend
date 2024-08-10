<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:pending,in_progress,completed'],
            'assignBy_id' => ['required', 'integer', 'exists:users,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'priority_id' => ['required', 'integer', 'exists:priorities,id'],
        ];
    }

    public function attributes() {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'user_id' => 'Assign To',
            'assignBy_id' => 'Assign By',
            'priority_id' => 'Priority',
        ];
    }
}
