<!-- Modal List Delete -->
<div class="modal fade" id="modal_list_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Eliminar llista</h4>
			</div>

			<div class="modal-body">
				<h4 class="modal-title">Segur que vols eliminar aquesta llista?</h4>
			</div>

			<div class="modal-footer">
				<form method="POST" action="{{ action('LlistesController@destroy', $list->id) }}">

					{{ method_field('PUT') }}
					{{ csrf_field() }}

					<button type="submit" class="btn btn-success">
						<i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Eliminar
					</button>

					<button class="btn btn-danger" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-times" aria-hidden="true"></i>&nbsp; Cancelar

					</button>
				</form>
			</div>

		</div>
	</div>
</div>
<!-- END Modal List Delete -->
