@extends('layouts/default')

@section('content')
	<h1>Category</h1>
	<hr>
	<a href="{{ route('category.create') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Category</a>
	<span class="clearfix"></span>
	</br>
	<div class="pull-right">
		<label class="checkbox-inline">
			<input type="checkbox" id="show_deleted">
			Show Deleted Items
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="show_meta">
			Show Metadata
		</label>
	</div>
	</br></br>
	<table id="categories" class="table table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Deleted At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->created_at }}</td>
					<td>{{ $category->updated_at }}</td>
					<td>{{ $category->deleted_at }}</td>
					<td>
						{{ Form::open(array('url' => route(isset($category->deleted_at) ? 'category.restore' : 'category.destroy', ['id' => $category->id]), 'method' => isset($category->deleted_at) ? 'PUT' : 'DELETE')) }}
							@if(!isset($category->deleted_at))
								<a href="{{ route('category.edit', ['id' => $category->id]) }}" title="Edit Item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							@endif
							<a href="#" class="submit-icon"><span class="{{ 'glyphicon '.(isset($category->deleted_at) ? 'glyphicon-repeat' : 'glyphicon-remove') }}" aria-hidden="true"></span></a>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('scripts')
	<script>
		$(document).ready(function () {
			var table = $('#categories').DataTable({
				columnDefs: [
					{
						targets: [0, 2, 3],
						visible: false,
						searchable: false
					},
					{
						targets: [4],
						visible: false
					}
				]
			});

			$('#show_meta').on('change', function () {
				if ($('#show_meta:checked').length > 0) {
					table.columns([0, 2, 3, 4]).visible(true);
				} else {
					table.columns([0, 2, 3, 4]).visible(false);
				}
			});

			$('#show_deleted').on('change', function () {
				table.draw();
			});

			$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
				var show_deleted = $('#show_deleted:checked').length;
				if (!show_deleted) return aData[4] == '';
				return true;
			});

			table.draw();

			table.on('draw.dt', function () {
				$('.submit-icon').on('click', function () {
					$(this).closest('form').submit();
				});
			});

			$('.submit-icon').on('click', function () {
				$(this).closest('form').submit();
			});
		});
	</script>
@stop