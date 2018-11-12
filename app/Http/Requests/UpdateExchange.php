<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExchange extends FormRequest
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
            'nrp' => 'required|digits:14',
            'angkatan' => 'required|digits:4',
            'keterangan' => 'required',
            'bukti' => 'nullable|image|max:5120',
        ];
    }
}
