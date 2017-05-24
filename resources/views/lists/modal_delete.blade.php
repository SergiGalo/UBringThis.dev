<!-- Delete List Modal -->
<div class="modal fade" id="modal-list-delete" tabindex="-1" role="dialog" aria-labelledby="deleteList">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="deleteList">Eliminar llista</h4>
			</div>

			<div class="modal-body text-center">
				<h4 class="modal-title">Segur que vols eliminar la llista?</h4>
			</div>

			<div class="modal-footer text-center">
				<form action="{{ action('LlistesController@destroy', $list->id) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">
						<i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Eliminar
					</button>

					<button class="btn btn-success" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-times" aria-hidden="true"></i>&nbsp; Cancel·lar
					</button>

				</form>
			</div>

		</div>
	</div>
</div>
<!-- END Delete List Modal -->
