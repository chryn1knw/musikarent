<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_hour' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'features' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'status' => 'required|in:available,rented,maintenance',
            'rating' => 'nullable|numeric|min:0|max:5'
        ];
    }

    public function prepareForValidation()
    {
        if ($this->features) {
            $this->merge([
                'features' => trim($this->features),
            ]);
        }
    }

    public function messages()
    {
        return [
            'photo.max' => 'Ukuran file tidak boleh melebihi 10MB',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format file harus jpeg, png, atau jpg',
        ];
    }
}