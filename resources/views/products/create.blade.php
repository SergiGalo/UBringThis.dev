@extends('layouts.welcome')

@section('page_title', 'Nou producte')


@section('content')

<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">

		<div class="panel-heading">
			<span class="fa-stack fa-lg">
				<i class="fa fa-lemon-o fa-stack-1x" aria-hidden="true"></i>
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
			&nbsp; Nou producte
		</div>

		<div class="panel-body">
			<form action="/products" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="list_id" value="{{ $list->id }}">

				<div class="form-group">
					<label for="name">Nom:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-6">
						<label for="quantity">Quantitat:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
							<input class="form-control" type="number" step="any" name="quantity" id="quantity" min="0" value="{{ old('quantity') }}">
						</div>
					</div>

					<div class="col-md-6">
						<label for="units">Unitats:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-tint" aria-hidden="true"></i></span>
							<select class="form-control" name="units" id="units">
							@if ( old('units') == 'unitats' )
								<option value="unitats" selected>unitats</option>
							@else
								<option value="unitats">unitats</option>
							@endif
							@if ( old('units') == 'Kilograms' )
								<option value="Kilograms" selected>kilograms</option>
							@else
								<option value="Kilograms">kilograms</option>
							@endif
							@if ( old('units') == 'litres' )
								<option value="litres" selected>litres</option>
							@else
								<option value="litres">litres</option>
							@endif
							@if ( old('units') == 'metres' )
								<option value="metres" selected>metres</option>
							@else
								<option value="metres">metres</option>
							@endif
							@if ( old('units') == 'pack/s' )
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
							<input class="form-control" type="number" step="any" name="price" id="price" min="0" value="{{ old('price') }}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="asigned_to">Assignat a:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
						<select class="form-control" name="assigned_to">
								<option value="0">&nbsp;</option>
								@if ( old('assigned_to') == $owner->owner )
									<option value="{{ $owner->owner }}" selected>{{ $owner->name.' '.$owner->last_name }}</option>
								@else
									<option value="{{ $owner->owner }}">{{ $owner->name.' '.$owner->last_name }}</option>
								@endif
							@foreach($colaboradors as $colaborador)
								@if ( old('assigned_to') == $colaborador->id )
									<option value="{{ $colaborador->id }}" selected>{{ $colaborador->name.' '.$colaborador->last_name }}</option>
									@else
										<option value="{{ $colaborador->id }}">{{ $colaborador->name.' '.$colaborador->last_name }}</option>
									@endif
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group text-center">
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
</div>

@endsection
