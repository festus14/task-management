<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServicesFeeRequest;
use App\Http\Requests\StoreServicesFeeRequest;
use App\Http\Requests\UpdateServicesFeeRequest;
use App\ServicesFee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesFeesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('services_fee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesFees = ServicesFee::all();

        return view('admin.servicesFees.index', compact('servicesFees'));
    }

    public function create()
    {
        abort_if(Gate::denies('services_fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.servicesFees.create');
    }

    public function store(StoreServicesFeeRequest $request)
    {
        $servicesFee = ServicesFee::create($request->all());

        return redirect()->route('admin.services-fees.index');
    }

    public function edit(ServicesFee $servicesFee)
    {
        abort_if(Gate::denies('services_fee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.servicesFees.edit', compact('servicesFee'));
    }

    public function update(UpdateServicesFeeRequest $request, ServicesFee $servicesFee)
    {
        $servicesFee->update($request->all());

        return redirect()->route('admin.services-fees.index');
    }

    public function show(ServicesFee $servicesFee)
    {
        abort_if(Gate::denies('services_fee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.servicesFees.show', compact('servicesFee'));
    }

    public function destroy(ServicesFee $servicesFee)
    {
        abort_if(Gate::denies('services_fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesFee->delete();

        return back();
    }

    public function massDestroy(MassDestroyServicesFeeRequest $request)
    {
        ServicesFee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
