@extends('layouts.welcome')

@section('page_title', 'Edició llista')


@section('content')

@if ( count(old()) > 0 )
<?php
	$data = old('event_date');
	$hora = old('event_time');
?>
@else
<?php
	$data = substr($list->event_date, 0, 10);
	$hora = substr($list->event_date, 11, 5);
?>
@endif

<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">

		<div class="panel-heading">
			<span class="fa-stack fa-lg">
				<i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true"></i>
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
			&nbsp; Edició llista
		</div>

		<div class="panel-body">
			<form action="{{ action('LlistesController@update', $list->id) }}" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">*Títol:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					@if ( count(old()) > 0 )
						<input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="títol de la llista/esdeveniment" required focus>
					@else
						<input class="form-control" type="text" name="title" id="title" value="{{ $list->title }}" placeholder="títol de la llista/esdeveniment" required focus>
					@endif
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-7">
					<label for="event_date">*Dia:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<input class="form-control" type="date" name="event_date" id="event_date" value="{{ $data }}" placeholder="{{ $data }}" required>
					</div>
				</div>

				<div class="col-md-5">
					<label for="event_time">*Hora:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						<input class="form-control" type="time" name="event_time" id="event_time" value="{{ $hora }}" placeholder="{{ $hora }}" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="location">Localització:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					@if ( count(old()) > 0 )
						<input class="form-control" type="text" name="location" id="location" value="{{ $list->location }}" placeholder="Adreça o ubicació de l'esdeveniment">
					@else
						<input class="form-control" type="text" name="location" id="location" value="{{ $list->location }}" placeholder="Adreça o ubicació de l'esdeveniment">
					@endif
				</div>
			</div>

			<div class="form-group">
				<label for="description">Descripció:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></span>
					@if ( count(old()) > 0 )
						<textarea class="form-control" rows="7" name="description" id="description" placeholder="Descripció o detalls referents a l'esdeveniment">{{ old('description') }}</textarea>
					@else
						<textarea class="form-control" rows="7" name="description" id="description" placeholder="Descripció o detalls referents a l'esdeveniment">{{ $list->description }}</textarea>
					@endif
				</div>
			</div>

			<p>(*) Camps obligatoris.</p>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Guardar canvis
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
