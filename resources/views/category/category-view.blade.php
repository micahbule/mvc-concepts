@extends('layouts/default')

@section('content')
	<a href="{{ route('category.index') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to Categories</a>
	<h1>{{ isset($category) ? 'Edit' : 'New' }} Category</h1>
	<hr>
	{{ Form::open(array("method" => (isset($category) ? "PUT" : "POST"), "url" => (isset($category) ? route('category.update', ['id' => $category->id]) : route('category.store')))) }}
		<div class="form-group">
			<label for="name">Category Name</label>
			<input class="form-control" type="text" name="name" value="{{ isset($category) ? $category->name : '' }}">
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	{{ Form::close() }}
@stop