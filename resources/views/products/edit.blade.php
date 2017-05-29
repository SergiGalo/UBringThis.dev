@extends('layouts.welcome')

@section('page_title', 'Edició producte')


@section('content')

<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">

		<div class="panel-heading">
			<span class="fa-stack fa-lg">
				<i class="fa fa-lemon-o fa-stack-1x" aria-hidden="true"></i>
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
			&nbsp; Edició producte
		</div>

		<div class="panel-body">
			<form action="/products/{{ $product->id }}" method="POST">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<input type="hidden" name="list_id" value="{{ $product->list_id }}">

				<div class="form-group">
					<label for="name">*Nom:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						@if ( count(old()) > 0 )
							<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="nom del producte">
						@else
							<input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}" placeholder="nom del producte">
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-6">
						<label for="quantity">Quantitat:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
							@if(old('quantity'))
								<input class="form-control" type="number" step="any" name="quantity" id="quantity" min="0" value="{{ old('quantity') }}" placeholder="nombre enter o decimal">
							@else
								<input class="form-control" type="number" step="any" name="quantity" id="quantity" min="0" value="{{ $product->quantity }}" placeholder="enter o decimal">
							@endif
						</div>
					</div>

					<div class="col-md-6">
						<label for="units">Unitats:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-tint" aria-hidden="true"></i></span>
							<select class="form-control" name="units" id="units">
							@if ( old('units') == 'unitats' OR $product->units == 'unitats')
								<option value="unitats" selected>unitats</option>
							@else
								<option value="unitats">unitats</option>
							@endif
							@if ( old('units') == 'Kilograms' OR $product->units == 'Kilograms' )
								<option value="Kilograms" selected>kilograms</option>
							@else
								<option value="Kilograms">kilograms</option>
							@endif
							@if ( old('units') == 'litres' OR $product->units == 'litres' )
								<option value="litres" selected>litres</option>
							@else
								<option value="litres">litres</option>
							@endif
							@if ( old('units') == 'metres' OR $product->units == 'metres' )
								<option value="metres" selected>metres</option>
							@else
								<option value="metres">metres</option>
							@endif
							@if ( old('units') == 'pack/s' OR $product->units == 'pack/s' )
								<option value="pack/s" selected>pack/s</option>
							@else
								<option value="pack/s">pack/s</option>
							@endif
							</select>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-6">
						<label for="price">Preu:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
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
								<option value="0">&nbsp;</option>
							@if ( old('assigned_to') == $owner->owner OR $product->assigned_to == $owner->owner )
								<option value="{{ $owner->owner }}" selected>{{ $owner->name.' '.$owner->last_name }}</option>
							@else
								<option value="{{ $owner->owner }}">{{ $owner->name.' '.$owner->last_name }}</option>
							@endif
							@foreach( $colaboradors as $colaborador )
								@if ( old('assigned_to') == $colaborador->id OR $product->assigned_to == $colaborador->id )
									<option value="{{ $colaborador->id }}" selected>{{ $colaborador->name.' '.$colaborador->last_name }}</option>
								@else
									<option value="{{ $colaborador->id }}">{{ $colaborador->name.' '.$colaborador->last_name }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

				@if ( Auth::user()->id == $owner->owner )
					<div class="form-check">
				@else
					<div class="invisible">
				@endif
						<label for="editable"></label>
						@if ( old('editable') == 1 OR $product->editable == 1 )
							<input type="checkbox" name="editable" id="editable" value="1" checked>
						@else
							<input type="checkbox" name="editable" id="editable" value="1">
						@endif
						&nbsp; Permetre als col·laboradors editar aquest producte.
					</div>

				<p>(*) Camps obligatoris.</p>

				<div class="form-group text-center">
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
</div>

@endsection
