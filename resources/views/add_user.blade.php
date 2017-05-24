<!-- Add User Form -->
<div class="collapse row" id="collapseAddUser">
	<form action="{{ action('ColaboradorsController@store') }}" method="POST" name="create-product-form">

		{{ csrf_field() }}

		<input type="hidden" name="list_id" value="{{ $list->id }}">

		<div class="form-group col-md-12">
			<label for="mail">E-mail usuari:</label>
			<div class="input-group col-md-12">
				<input class="form-control" type="email" name="mail" id="mail">
			</div>
		</div>

		<div class="form-group  col-md-12">
			<button type="submit" class="btn btn-success text-center">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
				Afegir Usuari
			</button>
		</div>

	</form>
</div>
<!-- END Add User Form -->
