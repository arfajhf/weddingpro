<?php

namespace App\Http\Requests\Undangan;

use Illuminate\Foundation\Http\FormRequest;

class UndanganRequest extends FormRequest
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
            'nama_pria' => ['required'],
            'nama_wanita' => ['required'],
            'tanggal_akad' => ['required'],
            'waktu_akad' => ['required'],
            'tanggal_resepsi' => ['required'],
            'waktu_resepsi' => ['required'],
            'alamat_akad' => ['required'],
            'alamat_resepsi' => ['required'],
            'gmaps_akad' => ['required'],
            'gmaps_resepsi' => ['required'],
            'foto_pria' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto_wanita' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto_hero' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'ortu_pria' => ['required'],
            'ortu_wanita' => ['required'],
            'no_rekening' => ['required'],
            'nama_pemilik' => ['required'],
            'nama_bank' => ['required'],
        ];
    }
}
