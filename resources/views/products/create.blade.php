@extends('layouts.master')

@section('page_title', 'Edició producte')

@section('sidebar')

@endsection

@section('content')

<div class="col-md-offset-1 col-md-8">
	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; Nou producte
	</h2>
	<div class="col-md-12">
		<form action="/products" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="list_id" value="{{ $list->id }}">

			<div class="form-group">
				<label for="name">Nom:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="name" id="name">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6">
					<label for="quantity">Quantitat:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="number" step="any" name="quantity" id="quantity" min="0">
					</div>
				</div>

				<div class="col-md-6">
					<label for="units">Unitats:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<select class="form-control" name="units" id="units">
							<option value="unitats">Unitats</option>
							<option value="Kilograms">Kilograms</option>
							<option value="litres">Litres</option>
							<option value="metres">Metres</option>
							<option value="pack/s">Pack/s</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6">
					<label for="price">Preu:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="number" step="any" name="price" id="price" min="0">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="asigned_to">Assignat a:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
					<select class="form-control" name="assigned_to">
							<option value="0">&nbsp;</option>
							<option value="{{ $owner->owner }}">{{ $owner->name.' '.$owner->last_name }}</option>
						@foreach($colaboradors as $colaborador)
							<option value="{{ $colaborador->id }}">{{ $colaborador->name.' '.$colaborador->last_name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success text-center">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Afegir
				</button>
				<a href="/lists/{{ $list->id }}" type="button" class="btn btn-danger">
					<i class="fa fa-times" aria-hidden="true"></i>&nbsp; Cancel·lar
				</a>
			</div>

			@include ('layouts.errors')

		</form>

	</div>
</div>

@endsection
