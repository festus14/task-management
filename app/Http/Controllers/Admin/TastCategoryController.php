<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTastCategoryRequest;
use App\Http\Requests\StoreTastCategoryRequest;
use App\Http\Requests\UpdateTastCategoryRequest;
use App\ProjectSubType;
use App\ProjectType;
use App\TastCategory;

class TastCategoryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_unless(\Gate::allows('tast_category_access'), 403);

        $tastCategories = TastCategory::all();

        return view('admin.tastCategories.index', compact('tastCategories'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('tast_category_create'), 403);

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = ProjectSubType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tastCategories.create', compact('project_types', 'sub_categories'));
    }

    public function store(StoreTastCategoryRequest $request)
    {
        abort_unless(\Gate::allows('tast_category_create'), 403);

        $tastCategory = TastCategory::create($request->all());

        return redirect()->route('admin.tast-categories.index');
    }

    public function edit(TastCategory $tastCategory)
    {
        abort_unless(\Gate::allows('tast_category_edit'), 403);

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = ProjectSubType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tastCategory->load('project_type', 'sub_category');

        return view('admin.tastCategories.edit', compact('project_types', 'sub_categories', 'tastCategory'));
    }

    public function update(UpdateTastCategoryRequest $request, TastCategory $tastCategory)
    {
        abort_unless(\Gate::allows('tast_category_edit'), 403);

        $tastCategory->update($request->all());

        return redirect()->route('admin.tast-categories.index');
    }

    public function show(TastCategory $tastCategory)
    {
        abort_unless(\Gate::allows('tast_category_show'), 403);

        $tastCategory->load('project_type', 'sub_category');

        return view('admin.tastCategories.show', compact('tastCategory'));
    }

    public function destroy(TastCategory $tastCategory)
    {
        abort_unless(\Gate::allows('tast_category_delete'), 403);

        $tastCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyTastCategoryRequest $request)
    {
        TastCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
