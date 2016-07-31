<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;

class BrandController extends Controller
{
    function index(Request $request) {
		$brands = Brand::withTrashed()->get();
		return view('brand/brand', ['brands' => $brands]);
	}

	function create() {
		return view('brand/brand-view');
	}

	function saveCreate(Request $request) {
		Brand::create($request->except('_token'));
		return redirect()->route('brand-index');
	}

	function edit($id) {
		$brand = Brand::find($id);
		return view('brand/brand-view', ['brand' => $brand]);
	}

	function saveEdit($id, Request $request) {
		Brand::where('id', $id)
			->update($request->except('_token', '_method'));

		return redirect()->route('brand-index');
	}

	function delete($id) {
		Brand::destroy($id);
		return redirect()->route('brand-index');
	}

	function restore($id) {
		Brand::onlyTrashed()
			->where('id', $id)
			->restore();

		return redirect()->route('brand-index');
	}
}
