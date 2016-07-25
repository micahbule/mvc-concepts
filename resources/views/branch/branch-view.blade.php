@extends('layouts/default')

@section('content')
	<a href="{{ route('branch-index') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to Branches</a>
	<h1>{{ isset($branch) ? 'Edit' : 'New' }} Branch</h1>
	<hr>
	{{ Form::open(array("method" => (isset($branch) ? "PUT" : "POST"))) }}
		<div class="form-group">
			<label for="name">Branch Name</label>
			<input class="form-control" type="text" name="name" value={{ isset($branch) ? $branch->name : '' }}>
		</div>
		<div class="form-group">
			<label for="city">City</label>
			<input class="form-control" type="text" name="city" value={{ isset($branch) ? $branch->city : '' }}>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	{{ Form::close() }}
@stop