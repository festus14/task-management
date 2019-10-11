<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollLetterRequest;
use App\Http\Requests\UpdatePayrollLetterRequest;
use App\Http\Resources\Admin\PayrollLetterResource;
use App\PayrollLetter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayrollLetterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payroll_letter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PayrollLetterResource(PayrollLetter::with(['type', 'client', 'project', 'services'])->get());
    }

    public function store(StorePayrollLetterRequest $request)
    {
        $payrollLetter = PayrollLetter::create($request->all());
        $payrollLetter->services()->sync($request->input('services', []));

        return (new PayrollLetterResource($payrollLetter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PayrollLetter $payrollLetter)
    {
        abort_if(Gate::denies('payroll_letter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PayrollLetterResource($payrollLetter->load(['type', 'client', 'project', 'services']));
    }

    public function update(UpdatePayrollLetterRequest $request, PayrollLetter $payrollLetter)
    {
        $payrollLetter->update($request->all());
        $payrollLetter->services()->sync($request->input('services', []));

        return (new PayrollLetterResource($payrollLetter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PayrollLetter $payrollLetter)
    {
        abort_if(Gate::denies('payroll_letter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payrollLetter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
