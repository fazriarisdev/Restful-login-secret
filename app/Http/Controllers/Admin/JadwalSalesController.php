<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJadwalSaleRequest;
use App\Http\Requests\StoreJadwalSaleRequest;
use App\Http\Requests\UpdateJadwalSaleRequest;
use App\Models\JadwalSale;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JadwalSalesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('jadwal_sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwalSales = JadwalSale::all();

        return view('admin.jadwalSales.index', compact('jadwalSales'));
    }

    public function create()
    {
        abort_if(Gate::denies('jadwal_sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jadwalSales.create');
    }

    public function store(StoreJadwalSaleRequest $request)
    {
        $jadwalSale = JadwalSale::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jadwalSale->id]);
        }

        return redirect()->route('admin.jadwal-sales.index');
    }

    public function edit(JadwalSale $jadwalSale)
    {
        abort_if(Gate::denies('jadwal_sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jadwalSales.edit', compact('jadwalSale'));
    }

    public function update(UpdateJadwalSaleRequest $request, JadwalSale $jadwalSale)
    {
        $jadwalSale->update($request->all());

        return redirect()->route('admin.jadwal-sales.index');
    }

    public function show(JadwalSale $jadwalSale)
    {
        abort_if(Gate::denies('jadwal_sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jadwalSales.show', compact('jadwalSale'));
    }

    public function destroy(JadwalSale $jadwalSale)
    {
        abort_if(Gate::denies('jadwal_sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwalSale->delete();

        return back();
    }

    public function massDestroy(MassDestroyJadwalSaleRequest $request)
    {
        JadwalSale::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('jadwal_sale_create') && Gate::denies('jadwal_sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JadwalSale();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
