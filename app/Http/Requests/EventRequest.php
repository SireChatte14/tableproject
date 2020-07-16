<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:3',

      ];
    }

    public function messages()
    {

    return[
            'title.required' => 'Titel fehlt',
            'title.min'=> 'Titel muss min. 3 Zeichen haben',
            'start.date_format' => 'Das von Datum hat nicht das richtige Format',
            'start.before' => 'Das Datum liegt nicht vor dem End Datum',
            'end.date_format' => 'Das bis Datum hat nicht das richtige Format',
            'end.after' => 'Das Datum liegt vor dem Anfangs Datum'
        ];

    }
}
