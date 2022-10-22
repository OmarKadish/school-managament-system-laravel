<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentAddUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required|max:30',
            'surname' => 'required|max:30',
            'birth_date' => 'required',
            'classroom' => ['required',Rule::exists('classrooms', 'id')],
            'parent_phone_number' => 'required|regex:/(0)[0-9]{10}/',
            'second_phone_number' => 'regex:/(0)[0-9]{10}/',
            'address' => 'required',
        ];
        if ($this->has('id')){
            $rules += ['enrollment_date' => 'required|date|after_or_equal:today',];
        } else {
            $rules += ['enrollment_date' => 'required|date',];
        }
        return $rules;

    }
}
