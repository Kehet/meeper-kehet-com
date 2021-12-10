<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3', 'max:1024'],
            'tags' => ['max:2014'],
        ];
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
