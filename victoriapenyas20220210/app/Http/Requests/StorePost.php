<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'titulo' => 'required|string|max:85',
            'extracto' => 'nullable|alpha_num',
            'contenido' => 'required|string|alpha_num',
            'comentable' => 'required',
            'caducable' => 'required',
            'acceso' => 'required|string|max:15',
            'fecha_publicacion' => 'required|date',
        ];
    }
}
