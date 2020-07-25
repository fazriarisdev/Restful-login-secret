<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWarRequest;
use App\Http\Requests\UpdateWarRequest;
use App\Http\Resources\Admin\WarResource;
use App\Models\War;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('war_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WarResource(War::all());
    }

    public function store(StoreWarRequest $request)
    {
        $war = War::create($request->all());

        return (new WarResource($war))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(War $war)
    {
        abort_if(Gate::denies('war_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WarResource($war);
    }

    public function update(UpdateWarRequest $request, War $war)
    {
        $war->update($request->all());

        return (new WarResource($war))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(War $war)
    {
        abort_if(Gate::denies('war_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $war->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
