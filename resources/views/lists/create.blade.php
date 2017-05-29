@extends('layouts.welcome')

@section('page_title', 'Nova llista')


@section('content')

@if ( count(old()) > 0 )
<?php
	$data = old('event_date');
	$hora = old('event_time');
?>
@endif

<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">

		<div class="panel-heading">
			<span class="fa-stack fa-lg">
				<i class="fa fa-cart-plus fa-stack-1x" aria-hidden="true"></i>
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
			&nbsp; Nova llista
		</div>

		<div class="panel-body">
			<form action="{{ action('LlistesController@store') }}" method="POST">

			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">*Títol:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="títol de la llista/esdeveniment" required focus>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-7">
					<label for="event_date">*Dia:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						@if ( count(old()) > 0 )
							<input class="form-control" type="date" name="event_date" id="event_date" value="{{ $data }}">
						@else
							<input class="form-control" type="date" name="event_date" id="event_date" required>
						@endif
					</div>
				</div>

				<div class="col-md-5">
					<label for="event_time">*Hora:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						@if ( count(old()) > 0 )
							<input class="form-control" type="time" name="event_time" id="event_time" value="{{ $hora }}" required>
						@else
							<input class="form-control" type="time" name="event_time" id="event_time" required>
						@endif
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="location">Localització:</label>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</span>
					<input class="form-control" type="text" name="location" id="location" placeholder="Adreça o ubicació de l'esdeveniment" value="{{ old('location') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="description">Descripció:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></span>
					<textarea class="form-control" rows="7" name="description" id="description" placeholder="Descripció o detalls referents a l'esdeveniment">{{ old('description') }}</textarea>
				</div>
			</div>

			<p>(*) Camps obligatoris.</p>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Crear llista
				</button>
				<a href="/lists" type="button" class="btn btn-danger">
					<i class="fa fa-times" aria-hidden="true"></i>&nbsp; Cancel·lar
				</a>
			</div>

			@include ('layouts.errors')

		</form>
		</div>

	</div>
</div>

@endsection
