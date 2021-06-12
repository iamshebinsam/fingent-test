<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMarkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => [
                'required',
                Rule::unique('marks')
                       ->where('term_id', $this->term_id),
            ],
            'term_id' => [
                'required',
                Rule::unique('marks')
                       ->where('student_id', $this->student_id),
            ],
            'science' => 'required|numeric|min:0|max:100',
            'history' => 'required|numeric|min:0|max:100',
            'maths' => 'required|numeric|min:0|max:100',
        ];
    }
}
