<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMarkRequest extends FormRequest
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
                        ->ignore($this->mark)
                        ->where('term_id', $this->term_id),
            ],
            'term_id' => [
                'required',
                Rule::unique('marks')
                        ->ignore($this->mark)
                        ->where('student_id', $this->student_id),
            ],
            'science' => 'required|numeric',
            'history' => 'required|numeric',
            'maths' => 'required|numeric',
        ];
    }
}
