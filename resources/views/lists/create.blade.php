@extends('layouts.master')

@section('title', 'Nova llista')

@section('content')

<div class="col-md-4">
	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; Nova llista</h2>
	<div class="col-md-12">
		<form action="{{ action('LlistesController@store') }}" method="POST">

			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Títol:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="title" id="title">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-7">
					<label for="event_date">Dia:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						<input class="form-control" type="date" name="event_date" id="event_date">
					</div>
				</div>

				<div class="col-md-5">
					<label for="event_time">Hora:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						<input class="form-control" type="time" name="event_time" id="event_time">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="location">Localització:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="location" id="location">
				</div>
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>
					Crear llista
				</button>
			</div>

			@include ('layouts.errors')

		</form>

	</div>
</div>

@endsection
