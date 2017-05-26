@extends('layouts.welcome')

@section('page_title', 'Login')


@section ('content')

<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">Benvingut/da</div>
		<div class="panel-body">
			<form role="form" method="POST" action="/login">

				{{ csrf_field() }}

				<div class="form-group">
					<label for="email">E-mail:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
					</div>
				</div>

				<div class="form-group">
					<label for="password">Contrasenya:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
						<input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" required>
					</div>
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; Accedir
					</button>
				</div>

				@include ('layouts.errors')

			</form>
		</div>
	</div>
</div>

@endsection
