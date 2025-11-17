<?php

namespace App\Http\Requests\Galeri;

use Illuminate\Foundation\Http\FormRequest;

class GaleriRequest extends FormRequest
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
            'image1' => ['nullable','image','mimes:jpeg,png,jpg','max:4096'],
            'image2' => ['nullable','image','mimes:jpeg,png,jpg','max:4096'],
            'image3' => ['nullable','image','mimes:jpeg,png,jpg','max:4096'],
            'image4' => ['nullable','image','mimes:jpeg,png,jpg','max:4096'],
            'image5' => ['nullable','image','mimes:jpeg,png,jpg','max:4096'],
            'image6' => ['nullable','image','mimes:jpeg,png,jpg','max:4096'],
        ];
    }
}
