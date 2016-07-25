<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Requests;
use App\Branch;

class BranchController extends Controller
{
	function index() {
		$branches = Branch::all();
		return view('branch/branch', ['branches' => $branches]);
	}

	function create() {
		return view('branch/branch-view');
	}

	function saveCreate(Request $request) {
		Branch::create($request->except('_token'));
		return redirect()->route('branch-index');
	}
}
