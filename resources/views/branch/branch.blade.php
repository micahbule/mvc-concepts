@extends('layouts/default')

@section('content')
	<h1>Branches</h1>
	<hr>
	<a href="/branch/new" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Branch</a>
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
	<table id="branches" class="table table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>City</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Deleted At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($branches as $branch)
				<tr>
					<td>{{ $branch->id }}</td>
					<td>{{ $branch->name }}</td>
					<td>{{ $branch->city }}</td>
					<td>{{ $branch->created_at }}</td>
					<td>{{ $branch->updated_at }}</td>
					<td>{{ $branch->deleted_at }}</td>
					<td>
						@if(isset($branch->deleted_at))
							<a href="{{ route('branch-restore', ['id' => $branch->id]) }}" title="Restore Item"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>
						@else
							<a href="{{ route('branch-edit', ['id' => $branch->id]) }}" title="Edit Item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="{{ route('branch-delete', ['id' => $branch->id]) }}" title="Delete Item"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
			var table = $('#branches').DataTable({
				columnDefs: [
					{
						targets: [0, 3, 4],
						visible: false,
						searchable: false
					},
					{
						targets: [5],
						visible: false
					}
				]
			});

			$('#show_meta').on('change', function () {
				if ($('#show_meta:checked').length > 0) {
					table.columns([0, 3, 4, 5]).visible(true);
				} else {
					table.columns([0, 3, 4, 5]).visible(false);
				}
			});

			$('#show_deleted').on('change', function () {
				table.draw();
			});

			$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
				var show_deleted = $('#show_deleted:checked').length;
				if (!show_deleted) return aData[5] == '';
				return true;
			});

			table.draw();
		});
	</script>
@stop