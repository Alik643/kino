<?php

namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|file',
            'rejisor_id' => 'nullable|integer|exists:rejisors,id',
            'year_id' => 'nullable|integer|exists:years,id',
            'actor_ids' => 'nullable|array',
            'actor_ids.*' => 'nullable|integer|exists:actors,id',
            'genre_ids' => 'nullable|array',
            'genre_ids.*' => 'nullable|integer|exists:genres,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Fill in the blank',
            'name.string' => 'Write text',
            'description.required' => 'Fill in the blank',
            'description.string' => 'Write text',
            'image.file' => 'Choose file',
            'rejisor_id.required' => 'Fill in the blank',
            'rejisor_id.integer' => 'Id of rejisor must be a number',
            'rejisor_id.exists' => 'Rejisor with this id doesnt exist',
            'year_id.required' => 'Fill in the blank',
            'year_id.integer' => 'Id of year must be a number',
            'year_id.exists' => 'Year with this id doesnt exist',
            'actor_ids.array' => 'It needs a array of members',
            'genre_ids.array' => 'It needs a array of members',
        ];
    }
}
