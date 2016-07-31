@extends('layouts/default')

@section('content')
	<h1>Brands</h1>
	<hr>
	<a href="/brand/new" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Brand</a>
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
	<table id="brands" class="table table-condensed">
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
			@foreach($brands as $brand)
				<tr>
					<td>{{ $brand->id }}</td>
					<td>{{ $brand->name }}</td>
					<td>{{ $brand->created_at }}</td>
					<td>{{ $brand->updated_at }}</td>
					<td>{{ $brand->deleted_at }}</td>
					<td>
						@if(isset($brand->deleted_at))
							<a href="{{ route('brand-restore', ['id' => $brand->id]) }}" title="Restore Item"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>
						@else
							<a href="{{ route('brand-edit', ['id' => $brand->id]) }}" title="Edit Item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="{{ route('brand-delete', ['id' => $brand->id]) }}" title="Delete Item"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('scripts')
	<script>
		$(document).ready(function () {
			var table = $('#brands').DataTable({
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
		});
	</script>
@stop