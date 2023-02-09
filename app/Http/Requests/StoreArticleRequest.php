<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => ['required', 'min: 3', 'max:60'],
            'category' => ['required', Rule::exists('categories', 'slug')],
            'tags' => ['required'],
            'text' => ['required'],
            'thumb' => ['required', 'file', 'image']
        ];
    }
}
