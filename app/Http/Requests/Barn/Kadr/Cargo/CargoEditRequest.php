<?php

namespace App\Http\Requests\Barn\Kadr\Cargo;

use Illuminate\Foundation\Http\FormRequest;

class CargoEditRequest extends FormRequest
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
            'file_name'=>['mimes:pdf,doc,docx','max:5120'],
        ];
    }

    public function messages()
    {
        return [
            'file_name.mimes' => 'Fayl formati xato!',
            'file_name.max'=>"Fayl hajmi oshib ketdi!",
        ];
    }
}
