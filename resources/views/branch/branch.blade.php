@extends('layouts/default')

@section('content')
	<h1>Branches</h1>
	<hr>
	<a href="/branch/new" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Branch</a>
	</br></br></br>
	<table id="branches" class="table table-condensed">
		<thead>
			<tr>
				<th>Name</th>
				<th>City</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($branches as $branch)
				<tr>
					<td>{{ $branch->name }}</td>
					<td>{{ $branch->city }}</td>
					<td>
						<a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('scripts')
	<script>
		$(document).ready(function () {
			$('#branches').DataTable();
		});
	</script>
@stop