@extends('layouts.welcome')

@section('page_title', 'Login')


@section ('content')

<div class="col-md-6 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">Accedeix</div>
		<div class="panel-body">
			<form role="form" method="POST" action="/login">

				{{ csrf_field() }}

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

				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; Accedir
					</button>
				</div>

				@include ('layouts.errors')

			</form>
		</div>
	</div>
</div>

@endsection
