<?php

namespace App\Http\Requests;

use App\Models\JadwalSale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateJadwalSaleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jadwal_sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name_partner'   => [
                'min:1',
                'max:20',
                'required',
            ],
            'name_end_user'  => [
                'required',
            ],
            'date'           => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time'           => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'agenda'         => [
                'required',
            ],
            'province'       => [
                'required',
            ],
            'address'        => [
                'required',
            ],
            'meeting_result' => [
                'required',
            ],
        ];
    }
}
