<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaper extends FormRequest
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
            'angkatan' => 'required','angkatan' => $request->angkatan,
            'judul' => 'required',
            'status_paper' => 'required',
            'bukti' => 'nullable|image|max:2048'
        ];
    }
}
