<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLetterTypeRequest;
use App\Http\Requests\UpdateLetterTypeRequest;
use App\Http\Resources\Admin\LetterTypeResource;
use App\LetterType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LetterTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('letter_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LetterTypeResource(LetterType::all());
    }

    public function store(StoreLetterTypeRequest $request)
    {
        $letterType = LetterType::create($request->all());

        return (new LetterTypeResource($letterType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LetterType $letterType)
    {
        abort_if(Gate::denies('letter_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LetterTypeResource($letterType);
    }

    public function update(UpdateLetterTypeRequest $request, LetterType $letterType)
    {
        $letterType->update($request->all());

        return (new LetterTypeResource($letterType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LetterType $letterType)
    {
        abort_if(Gate::denies('letter_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $letterType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
