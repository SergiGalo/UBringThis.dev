@extends('layouts.master')

@section('title', 'Colaboradors')

@section('content')

<div class="col-md-offset-1 col-md-8">
	<h2 class="sub-header">
		<i class="fa fa-user-times fa-2x" aria-hidden="true"></i>&nbsp; Colaboradors
	</h2>
	<div class="col-md-12">
		<form action="/colaborations" method="POST">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}

			<input type="hidden" name="list_id" value="{{ $list_id }}">

			<div class="form-group">
				<label for="colaboradors">Desmarca els usuaris a eliminar:</label>
				@foreach($colaboradors as $colaborador)
					<div class="list-group-item">
						<input class="form-group-item" type="checkbox" name="colaboradors[]" value="{{ $colaborador->id }}" checked>
						&nbsp; {{ $colaborador->name.' '.$colaborador->last_name }}
					</div>
				@endforeach
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Guardar
				</button>
				<a href="/lists/{{ $list_id }}" type="button" class="btn btn-danger">
					<i class="fa fa-times" aria-hidden="true"></i>&nbsp; Cancel·lar
				</a>
			</div>

		</form>

	</div>
</div>

@endsection
