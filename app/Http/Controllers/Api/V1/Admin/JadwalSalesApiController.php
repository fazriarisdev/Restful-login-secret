<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJadwalSaleRequest;
use App\Http\Requests\UpdateJadwalSaleRequest;
use App\Http\Resources\Admin\JadwalSaleResource;
use App\Models\JadwalSale;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JadwalSalesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('jadwal_sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JadwalSaleResource(JadwalSale::all());
    }

    public function store(StoreJadwalSaleRequest $request)
    {
        $jadwalSale = JadwalSale::create($request->all());

        return (new JadwalSaleResource($jadwalSale))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JadwalSale $jadwalSale)
    {
        abort_if(Gate::denies('jadwal_sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JadwalSaleResource($jadwalSale);
    }

    public function update(UpdateJadwalSaleRequest $request, JadwalSale $jadwalSale)
    {
        $jadwalSale->update($request->all());

        return (new JadwalSaleResource($jadwalSale))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JadwalSale $jadwalSale)
    {
        abort_if(Gate::denies('jadwal_sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwalSale->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
