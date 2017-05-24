@extends('layouts.welcome')

@section('page_title', 'Registre')


@section ('content')

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registre de nou usuari</div>
		<div class="panel-body">
			<form role="form" method="POST" action="/register">

				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Nom:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
					</div>
				</div>

				<div class="form-group">
					<label for="last_name">Cognoms:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
					</div>
				</div>

				<div class="form-group">
					<label for="email">E-mail:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
					</div>
				</div>

				<div class="form-group">
					<label for="password">Contrasenya:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
						<input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" required>
					</div>
				</div>

				<div class="form-group">
					<label for="password_confirmation">Confirmar contrasenya:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
						<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required>
					</div>
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Registrar-se
					</button>
				</div>

				@include ('layouts.errors')

			</form>
		</div>
	</div>
</div>

@endsection
