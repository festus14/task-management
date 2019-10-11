<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPayrollLetterRequest;
use App\Http\Requests\StorePayrollLetterRequest;
use App\Http\Requests\UpdatePayrollLetterRequest;
use App\PayrollLetter;
use App\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayrollLetterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payroll_letter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payrollLetters = PayrollLetter::all();

        return view('admin.payrollLetters.index', compact('payrollLetters'));
    }

    public function create()
    {
        abort_if(Gate::denies('payroll_letter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payrollLetters.create', compact('clients', 'projects'));
    }

    public function store(StorePayrollLetterRequest $request)
    {
        $payrollLetter = PayrollLetter::create($request->all());

        return redirect()->route('admin.payroll-letters.index');
    }

    public function edit(PayrollLetter $payrollLetter)
    {
        abort_if(Gate::denies('payroll_letter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payrollLetter->load('client', 'project');

        return view('admin.payrollLetters.edit', compact('clients', 'projects', 'payrollLetter'));
    }

    public function update(UpdatePayrollLetterRequest $request, PayrollLetter $payrollLetter)
    {
        $payrollLetter->update($request->all());

        return redirect()->route('admin.payroll-letters.index');
    }

    public function show(PayrollLetter $payrollLetter)
    {
        abort_if(Gate::denies('payroll_letter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payrollLetter->load('client', 'project');

        return view('admin.payrollLetters.show', compact('payrollLetter'));
    }

    public function destroy(PayrollLetter $payrollLetter)
    {
        abort_if(Gate::denies('payroll_letter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payrollLetter->delete();

        return back();
    }

    public function massDestroy(MassDestroyPayrollLetterRequest $request)
    {
        PayrollLetter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
