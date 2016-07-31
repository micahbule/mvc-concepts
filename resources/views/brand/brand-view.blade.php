@extends('layouts/default')

@section('content')
	<a href="{{ route('branch-index') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to Brands</a>
	<h1>{{ isset($brand) ? 'Edit' : 'New' }} Brand</h1>
	<hr>
	{{ Form::open(array("method" => (isset($brand) ? "PUT" : "POST"))) }}
		<div class="form-group">
			<label for="name">Brand Name</label>
			<input class="form-control" type="text" name="name" value={{ isset($brand) ? $brand->name : '' }}>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	{{ Form::close() }}
@stop