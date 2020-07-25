<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWarRequest;
use App\Http\Requests\StoreWarRequest;
use App\Http\Requests\UpdateWarRequest;
use App\Models\War;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('war_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wars = War::all();

        return view('admin.wars.index', compact('wars'));
    }

    public function create()
    {
        abort_if(Gate::denies('war_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.wars.create');
    }

    public function store(StoreWarRequest $request)
    {
        $war = War::create($request->all());

        return redirect()->route('admin.wars.index');
    }

    public function edit(War $war)
    {
        abort_if(Gate::denies('war_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.wars.edit', compact('war'));
    }

    public function update(UpdateWarRequest $request, War $war)
    {
        $war->update($request->all());

        return redirect()->route('admin.wars.index');
    }

    public function show(War $war)
    {
        abort_if(Gate::denies('war_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.wars.show', compact('war'));
    }

    public function destroy(War $war)
    {
        abort_if(Gate::denies('war_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $war->delete();

        return back();
    }

    public function massDestroy(MassDestroyWarRequest $request)
    {
        War::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
