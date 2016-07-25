<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Requests;
use App\Branch;

class BranchController extends Controller
{
	function index(Request $request) {
		$branches = Branch::withTrashed()->get();
		return view('branch/branch', ['branches' => $branches]);
	}

	function create() {
		return view('branch/branch-view');
	}

	function saveCreate(Request $request) {
		Branch::create($request->except('_token'));
		return redirect()->route('branch-index');
	}

	function edit($id) {
		$branch = Branch::find($id);
		return view('branch/branch-view', ['branch' => $branch]);
	}

	function saveEdit($id, Request $request) {
		Branch::where('id', $id)
			->update($request->except('_token', '_method'));

		return redirect()->route('branch-index');
	}

	function delete($id) {
		Branch::destroy($id);
		return redirect()->route('branch-index');
	}

	function restore($id) {
		Branch::onlyTrashed()
			->where('id', $id)
			->restore();

		return redirect()->route('branch-index');
	}
}
