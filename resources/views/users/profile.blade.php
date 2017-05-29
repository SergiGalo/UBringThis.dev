@extends('layouts.master')

@section('page_title', 'Perfil')


@section('sidebar')
@endsection


@section('content')

<div class="col-md-6">
	<div class="panel panel-default" style="margin-top: 30px">
		<div class="panel-heading">
			<span class="fa-stack fa-lg">
				<i class="fa fa-user-o fa-stack-1x" aria-hidden="true"></i>
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
			&nbsp; Dades de l'usuari</div>
		<div class="panel-body">
			<form role="form" method="POST" action="/profile">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nom:</label>
					<div class="input-group">
						<input class="form-control" type="text" name="name" id="name"
						@if ( old('name') )
							value="{{ old('name') }}"
						@else
							value="{{ Auth::user()->name }}"
						@endif
						required autofocus>
					</div>
				</div>

				<div class="form-group">
					<label for="last_name">Cognoms:</label>
					<div class="input-group">
						<input class="form-control" type="text" name="last_name" id="last_name"
						@if ( old('last_name') )
							value="{{ old('last_name') }}"
						@else
							value="{{ Auth::user()->last_name }}"
						@endif
						required>
					</div>
				</div>

				<div class="form-group">
					<label for="email">E-mail:</label>
					<div class="input-group">
						<input class="form-control" type="email" name="email" id="email"
						@if ( old('email') )
							value="{{ old('email') }}"
						@else
							value="{{ Auth::user()->email }}"
						@endif
						required>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-address-card" aria-hidden="true"></i>&nbsp; Guardar canvis
					</button>
				</div>

				@include ('layouts.errors')

			</form>
		</div>
	</div>
</div>

@endsection
