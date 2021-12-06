<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3', 'max:1024'],
        ];
    }

    public function authorize(): bool
    {
        return true;
        //return Auth::check();
    }
}
