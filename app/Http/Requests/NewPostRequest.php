<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NewPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['nullable', 'min:2', 'max:255'],
            'image' => ['nullable', 'file', 'max:51200'],
            'url' => ['nullable', 'min:2', 'max:255'],
            'body' => ['nullable', 'min:3', 'max:1024'],
            'tags' => ['max:2014'],
        ];
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
