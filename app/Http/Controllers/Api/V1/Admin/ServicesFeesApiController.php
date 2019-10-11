<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServicesFeeRequest;
use App\Http\Requests\UpdateServicesFeeRequest;
use App\Http\Resources\Admin\ServicesFeeResource;
use App\ServicesFee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesFeesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('services_fee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServicesFeeResource(ServicesFee::all());
    }

    public function store(StoreServicesFeeRequest $request)
    {
        $servicesFee = ServicesFee::create($request->all());

        return (new ServicesFeeResource($servicesFee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ServicesFee $servicesFee)
    {
        abort_if(Gate::denies('services_fee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServicesFeeResource($servicesFee);
    }

    public function update(UpdateServicesFeeRequest $request, ServicesFee $servicesFee)
    {
        $servicesFee->update($request->all());

        return (new ServicesFeeResource($servicesFee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ServicesFee $servicesFee)
    {
        abort_if(Gate::denies('services_fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesFee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
