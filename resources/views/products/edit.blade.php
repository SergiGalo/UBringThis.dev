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
		<form action="{{ action('ProductesController@update', $product->id) }}" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<input type="hidden" name="list_id" value="{{ $product->list_id }}">

			<div class="form-group">
				<label for="name">Nou nom:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}" placeholder="{{ $product->name }}">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6">
					<label for="quantity">Quantitat:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="number" name="quantity" id="quantity" min="0" value="{{ $product->quantity }}" placeholder="{{ $product->quantity }}">
					</div>
				</div>

				<div class="col-md-6">
					<label for="units">Unitats:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<select class="form-control" name="units" id="units" value="{{ $product->units }}" placeholder="{{ $product->units }}">
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
						<input class="form-control" type="number" step="any" name="price" id="price" min="0" value="{{ $product->price }}" placholder="{{ $product->price }}">
					</div>
				</div>

				<div class="col-md-6">
					<label for="asigned_to">Assignat a:</label>
					<div class="input-group">
						<select class="form-control" name="assigned_to">
							@if ($product->assigned_to)
								<option value="0">&nbsp;</option>
							@else
								<option value="0" selected>&nbsp;</option>
							@endif

							@if ($product->assigned_to == $owner->owner)
								<option value="{{ $owner->owner }}" selected>{{ $owner->name }}</option>
							@else
								<option value="{{ $owner->owner }}">{{ $owner->name }}</option>
							@endif
							@foreach($colaboradors as $colaborador)
								@if ($product->assigned_to == $colaborador->id)
									<option value="{{ $colaborador->id }}" selected>{{ $colaborador->name }}</option>
								@else
									<option value="{{ $colaborador->id }}">{{ $colaborador->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
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
