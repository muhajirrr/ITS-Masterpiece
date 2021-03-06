<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLomba extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'angkatan' => 'required',
            'nama_lomba' => 'required',
            'juara' => 'required',
            'penyelenggara' => 'required',
            'bukti' => 'nullable|image|max:2048'
        ];
    }
}
