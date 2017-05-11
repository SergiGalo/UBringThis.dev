<!-- FORM: Product create -->
<div class="collapse row" id="collapseCreateProduct">

	<form action="{{ action('ProductesController@store') }}" method="POST" name="create-product-form">

		{{ csrf_field() }}

		<input type="hidden" name="list_id" value="{{ $list->id }}">

		<div class="form-group col-md-3">
			<label for="name">Nom:</label>
			<div class="input-group">
				<input class="form-control" type="text" name="name" id="name">
			</div>
		</div>

		<div class="row form-group col-md-5">

			<div class="col-md-6">
				<label for="quantity">Quantitat:</label>
				<div class="input-group">
					<input class="form-control" type="number" name="quantity" id="quantity" min="0">
				</div>
			</div>

			<div class="col-md-6">
				<label for="units">Unitats:</label>
				<div class="input-group">
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

		<div class="form-group col-md-2">
			<label for="price">Preu:</label>
			<div class="input-group">
				<input class="form-control" type="number" step="any" name="price" id="price" min="0">
			</div>
		</div>

		<div class="form-group col-md-2">
			<label for="asigned_to">Assignat a:</label>
			<div class="input-group">
				<select class="form-control" name="assigned_to">
						<option value="0"></option>
						<option value="{{ $list->owner }}">Propietari</option>
					@foreach($colaboradors as $colaborador)
						<option value="{{ $colaborador->id }}">{{ $colaborador->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group col-md-2">
			<button type="submit" class="btn btn-success text-center">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
				Afegir
			</button>
		</div>

		@include ('layouts.errors')

	</form>
</div>
