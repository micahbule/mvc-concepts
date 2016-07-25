@extends('layouts/default')

@section('content')
	<h1>New Branch</h1>
	<hr>
	{{ Form::open(array("method" => "POST")) }}
		<div class="form-group">
			<label for="name">Branch Name</label>
			<input class="form-control" type="text" name="name" />
		</div>
		<div class="form-group">
			<label for="city">City</label>
			<input class="form-control" type="text" name="city" />
		</div>
		<button type="submit" class="btn btn-primary">Add</button>
	{{ Form::close() }}
@stop