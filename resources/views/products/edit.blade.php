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
		&nbsp; Edició producte
	</h2>
	<div class="col-md-12">
		<form action="/products/{{ $product->id }}" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<input type="hidden" name="list_id" value="{{ $product->list_id }}">

			<div class="form-group">
				<label for="name">Nom:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					@if(old('name'))
						<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
					@else
						<input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}	">
					@endif
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6">
					<label for="quantity">Quantitat:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						@if(old('quantity'))
							<input class="form-control" type="number" step="any" name="quantity" id="quantity" min="0" value="{{ old('quantity') }}">
						@else
							<input class="form-control" type="number" step="any" name="quantity" id="quantity" min="0" value="{{ $product->quantity }}">
						@endif
					</div>
				</div>

				<div class="col-md-6">
					<label for="units">Unitats:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						@if(old('units'))
							<select class="form-control" name="units" id="units" value="{{ old('units') }}">
						@else
							<select class="form-control" name="units" id="units" value="{{ $product->units }}">
						@endif
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
						@if(old('price'))
							<input class="form-control" type="number" step="any" name="price" id="price" min="0" value="{{ old('price') }}">
						@else
							<input class="form-control" type="number" step="any" name="price" id="price" min="0" value="{{ $product->price }}">
						@endif
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="asigned_to">Assignat a:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
					<select class="form-control" name="assigned_to">
						@if ($product->assigned_to)
							<option value="0">&nbsp;</option>
						@else
							<option value="0" selected>&nbsp;</option>
						@endif

						@if ($product->assigned_to == $owner->owner)
							<option value="{{ $owner->owner }}" selected>{{ $owner->name.' '.$owner->last_name }}</option>
						@else
							<option value="{{ $owner->owner }}">{{ $owner->name.' '.$owner->last_name }}</option>
						@endif
						@foreach($colaboradors as $colaborador)
							@if ($product->assigned_to == $colaborador->id)
								<option value="{{ $colaborador->id }}" selected>{{ $colaborador->name.' '.$colaborador->last_name }}</option>
							@else
								<option value="{{ $colaborador->id }}">{{ $colaborador->name.' '.$colaborador->last_name }}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success text-center">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Modificar
				</button>
				<a href="/lists/{{ $product->list_id }}" type="button" class="btn btn-danger">
					<i class="fa fa-times" aria-hidden="true"></i>&nbsp; Cancel·lar
				</a>
			</div>

			@include ('layouts.errors')

		</form>

	</div>
</div>

@endsection
