<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'min:2', 'max:255'],
            'remove_old_image' => ['boolean'],
            'image' => ['nullable', 'image', 'max:51200'],
            'body' => ['nullable', 'min:3', 'max:1024'],
            'tags' => ['max:2014'],
        ];
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
