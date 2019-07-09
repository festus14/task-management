<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTastCategoryRequest;
use App\Http\Requests\UpdateTastCategoryRequest;
use App\TastCategory;

class TastCategoryApiController extends Controller
{
    public function index()
    {
        $tastCategories = TastCategory::all();

        return $tastCategories;
    }

    public function store(StoreTastCategoryRequest $request)
    {
        return TastCategory::create($request->all());
    }

    public function update(UpdateTastCategoryRequest $request, TastCategory $tastCategory)
    {
        return $tastCategory->update($request->all());
    }

    public function show(TastCategory $tastCategory)
    {
        return $tastCategory;
    }

    public function destroy(TastCategory $tastCategory)
    {
        $tastCategory->delete();

        return response("OK", 200);
    }
}
