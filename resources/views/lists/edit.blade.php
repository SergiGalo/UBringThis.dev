@extends('layouts.master')

@section('page_title', 'Edició llista')

@section('sidebar')

@endsection

@section('content')

<?php
	$data = substr($list->event_date, 0, 10);
	$hora = substr($list->event_date, 11, 5);
?>

<div class="col-md-offset-1 col-md-8">
	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; Edició llista
	</h2>
	<div class="col-md-12">
		<form action="{{ action('LlistesController@update', $list->id) }}" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Nou títol:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="title" id="title" value="{{ $list->title }}" placeholder="{{ $list->title }}">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-7">
					<label for="event_date">Nou dia:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						<input class="form-control" type="date" name="event_date" id="event_date" value="{{ $data }}" placeholder="{{ $data }}">
					</div>
				</div>

				<div class="col-md-5">
					<label for="event_time">Nova hora:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						<input class="form-control" type="time" name="event_time" id="event_time" value="{{ $hora }}" placeholder="{{ $hora }}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="location">Nova localització:</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					<input class="form-control" type="text" name="location" id="location" value="{{ $list->location }}" placeholder="{{ $list->location }}">
				</div>
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Guardar canvis
				</button>
			</div>

			@include ('layouts.errors')

		</form>

	</div>
</div>

@endsection
