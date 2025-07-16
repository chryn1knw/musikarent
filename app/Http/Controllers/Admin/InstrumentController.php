<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstrumentRequest;
use App\Models\Instrument;
use App\Models\InstrumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrumentController extends Controller
{
    public function index()
    {
        $instruments = Instrument::with('category')->where('status', 'available')->latest()->paginate(10);

        return view('admin.instruments.index', compact('instruments'));
    }

    public function create()
    {
        $categories = InstrumentCategory::all();
        $statuses = ['available', 'rented', 'maintenance'];
        return view('admin.instruments.create', compact('categories', 'statuses'));
    }

    public function store(InstrumentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('instruments', 'public');
        }

        Instrument::create($data);

        return redirect()->route('admin.instruments.index')
            ->with('success', 'Instrument created successfully');
    }

    public function edit(Instrument $instrument)
    {
        $categories = InstrumentCategory::all();
        $statuses = ['available', 'rented', 'maintenance'];
        return view('admin.instruments.edit', compact('instrument', 'categories', 'statuses'));
    }

    public function update(InstrumentRequest $request, Instrument $instrument)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($instrument->photo_url) {
                Storage::disk('public')->delete($instrument->photo_url);
            }
            $data['photo_url'] = $request->file('photo')->store('instruments', 'public');
        }

        $instrument->update($data);

        return redirect()->route('admin.instruments.index')
            ->with('success', 'Instrument updated successfully');
    }

    public function destroy(Instrument $instrument)
    {
        if ($instrument->photo_url) {
            Storage::disk('public')->delete($instrument->photo_url);
        }

        $instrument->delete();

        return redirect()->route('admin.instruments.index')
            ->with('success', 'Instrument deleted successfully');
    }
}