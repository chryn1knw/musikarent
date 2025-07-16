<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudioRequest;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::latest()->paginate(10);
        $statuses = ['available', 'rented', 'maintenance'];
        return view('admin.studios.index', compact('studios', 'statuses'));
    }

    public function create()
    {
        $statuses = ['available', 'rented', 'maintenance'];
        return view('admin.studios.create', compact('statuses'));
    }

    public function store(StudioRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('studios', 'public');
        }

        Studio::create($data);

        return redirect()->route('admin.studios.index')
            ->with('success', 'Studio created successfully');
    }

    public function edit(Studio $studio)
    {
        $statuses = ['available', 'rented', 'maintenance'];
        return view('admin.studios.edit', compact('studio', 'statuses'));
    }

    public function update(StudioRequest $request, Studio $studio)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($studio->photo_url) {
                Storage::disk('public')->delete($studio->photo_url);
            }
            $data['photo_url'] = $request->file('photo')->store('studios', 'public');
        }

        $studio->update($data);

        return redirect()->route('admin.studios.index')
            ->with('success', 'Studio updated successfully');
    }

    public function destroy(Studio $studio)
    {
        if ($studio->photo_url) {
            Storage::disk('public')->delete($studio->photo_url);
        }

        $studio->delete();

        return redirect()->route('admin.studios.index')
            ->with('success', 'Studio deleted successfully');
    }
}