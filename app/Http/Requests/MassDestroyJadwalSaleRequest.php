<?php

namespace App\Http\Requests;

use App\Models\JadwalSale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJadwalSaleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jadwal_sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jadwal_sales,id',
        ];
    }
}
