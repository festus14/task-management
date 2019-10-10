<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLetterTypeRequest;
use App\Http\Requests\StoreLetterTypeRequest;
use App\Http\Requests\UpdateLetterTypeRequest;
use App\LetterType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LetterTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('letter_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $letterTypes = LetterType::all();

        return view('admin.letterTypes.index', compact('letterTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('letter_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.letterTypes.create');
    }

    public function store(StoreLetterTypeRequest $request)
    {
        $letterType = LetterType::create($request->all());

        return redirect()->route('admin.letter-types.index');
    }

    public function edit(LetterType $letterType)
    {
        abort_if(Gate::denies('letter_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.letterTypes.edit', compact('letterType'));
    }

    public function update(UpdateLetterTypeRequest $request, LetterType $letterType)
    {
        $letterType->update($request->all());

        return redirect()->route('admin.letter-types.index');
    }

    public function show(LetterType $letterType)
    {
        abort_if(Gate::denies('letter_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.letterTypes.show', compact('letterType'));
    }

    public function destroy(LetterType $letterType)
    {
        abort_if(Gate::denies('letter_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $letterType->delete();

        return back();
    }

    public function massDestroy(MassDestroyLetterTypeRequest $request)
    {
        LetterType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
