<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'age' => 'required|numeric|min:15|max:50',
            'gender' => 'required',
            'teacher_id' => 'required|numeric',
        ];
    }
}
