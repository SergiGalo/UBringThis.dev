@extends('layouts.master')

@section('title', 'Nova llista')

@section('content')

<div class="col-md-offset-1 col-md-8">
	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; Nova llista</h2>
	<div class="col-md-12">
		<form action="{{ action('LlistesController@store') }}" method="POST">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="colab">Títol:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					@foreach ('$colaboradors as $colaborador')
						<input class="form-control" type="checkbox" name="colab" id="{{ $colaborador->id }}" checked>&nbsp; {{ $colaborador->name.' '.$colaborador->last_name }}
				</div>
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Guardar
				</button>
			</div>

		</form>

	</div>
</div>

@endsection
