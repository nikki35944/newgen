<?php

namespace App\Http\Requests\Song;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'yandexMusicUrl' => 'required|regex:(https://music\.yandex\.ru/artist/[0-9]+/tracks)|min:5|max:100',

        ];
    }
}
