<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Instrument;
use App\Models\InstrumentCategory;


class InstrumentController extends Controller
{
    public function index()
    {
        $instruments = Instrument::with('category')->where('status', 'available')->latest()->paginate(10);
        
        $categories = InstrumentCategory::all();
        $brands = Instrument::select('brand')->distinct()->pluck('brand');

        return view('customer.instruments.index', compact('instruments', 'categories', 'brands'));
    }

    public function show(Instrument $instrument)
    {
        return view('customer.instruments.show', compact('instrument'));
    }
}
