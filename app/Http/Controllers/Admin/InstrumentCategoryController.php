<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstrumentCategoryRequest;
use App\Models\InstrumentCategory;
use Illuminate\Http\Request;

class InstrumentCategoryController extends Controller
{
    public function index()
    {
        $categories = InstrumentCategory::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(InstrumentCategoryRequest $request)
    {
        InstrumentCategory::create($request->validated());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }

    public function edit(InstrumentCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(InstrumentCategoryRequest $request, InstrumentCategory $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(InstrumentCategory $category)
    {
        if ($category->instruments()->exists()) {
            return redirect()->back()
                ->with('error', 'Cannot delete category with associated instruments');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}