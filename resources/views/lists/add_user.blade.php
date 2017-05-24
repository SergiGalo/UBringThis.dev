<!-- Add User Form -->
<div class="collapse row" id="collapseAddUser">
	<form class="" role="form" method="POST" action="/colaborations" name="create-product-form">

		{{ csrf_field() }}

		<input type="hidden" name="list_id" value="{{ $list->id }}">

		<div class="form-group">
			<label for="mail" class="col-md-12 control-label">E-Mail usuari:</label>
			<div class="col-md-12">
				<input type="email" class="form-control" name="mail" value="{{ old('email') }}">
			</div>
		</div>

		<div class="form-group  col-md-12">
			<button type="submit" class="btn btn-success text-center">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
				Afegir Usuari
			</button>
		</div>

		@include ('layouts.errors')

	</form>
</div>
<!-- END Add User Form -->
