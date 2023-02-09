<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'slug' => [
                        'required',
                        Rule::unique('tags')->where(fn ($query) => $query->where('user_id', auth()->id()))
                                            ->ignore($this->tag->id)
                      ]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name, '-')
        ]);
    }

    public function attributes()
    {
        return [
            'slug' => 'nome'
        ];
    }
}
