<?php

namespace App\Http\Requests;

use App\Models\War;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateWarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('war_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'project_name'  => [
                'min:20',
                'max:20',
            ],
            'city'          => [
                'min:20',
                'max:20',
            ],
            'value_project' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'timeline'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
