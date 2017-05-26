@if (count($errors))

<div class="form-group col-md-12">
	<div class="alert alert-danger">
		<ul>

			@foreach($errors->all() as $error)

				<li class="list-group-error">
					<i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp; {{ $error }}
				</li>

			@endforeach

		</ul>
	</div>
</div>

@endif
