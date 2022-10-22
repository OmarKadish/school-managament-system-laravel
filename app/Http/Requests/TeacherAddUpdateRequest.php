<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherAddUpdateRequest extends FormRequest
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
        return [
            'first_name' => 'required|max:30',
            'surname' => 'required|max:30',
            'birth_date' => 'required',
            'email' => 'required|email|unique:teachers,email',
            //'classroom' => ['required',Rule::exists('classrooms', 'id')],
            'phone_number' => 'required|regex:/(0)[0-9]{10}/',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
            'address' => 'required',
        ];
    }
}
