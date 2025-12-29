<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:5'],
            'speakers' => ['required', 'string', 'min:3'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'address' => ['required', 'string', 'min:3'],
        ];
    }
}
