<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            "name" => "required|min:2|max:50",
            "description" => "required|min:3",
            "project_duration" => "required"
        ];
    }

    public function messages(){
        return [
            "name.required" => 'Devi inserire il titolo del progetto',
            "name.min" => 'Il titolo del progetto deve avere almeno :min caratteri',
            "name.max" => 'Il titolo del progetto non può avere più di :max caratteri',
            "description.required" => 'La descrizione del progetto non può essere vuoto',
            "description.min" =>  'La descrizione del progetto deve avere almeno :min caratteri',
            "project_duration.required" =>  'La data di creazione deve essere inserita'
        ];
    }
}
