<!-- Add User -->
<div class="modal fade text-center" id="modal-delete-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<div class="modal-body">
				<h4 class="modal-title" id="exampleModalLabel">Segur que vols eliminar la llista?</h4>

				<form method="POST" action="{{ action('LlistesController@delete', $list->id) }}">

					{{ csrf_field() }}

					<button type="submit" class="btn btn-success">
						<i class="fa fa-trash" aria-hidden="true"></i>&nbsp Eliminar
					</button>

					<button class="btn btn-danger" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-times" aria-hidden="true"></i>&nbsp Cancelar

					</button>
				</form>

			</div>

			<div class="modal-footer">
			</div>

		</div>
	</div>
</div>
<!-- END Add User Modal -->
