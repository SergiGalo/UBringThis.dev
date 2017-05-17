<!-- Delete List Modal -->
<div class="modal fade text-center" id="modal-product-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<div class="modal-body">
				<h4 class="modal-title" id="exampleModalLabel">Segur que vols eliminar el producte?</h4>

				<!-- FORM: Product delete -->
				<form action="/products/:PRODUCT_ID" method="POST" id="form-product-delete">

					{{ method_field('PUT') }}

					{{ csrf_field() }}

					<input type="hidden" name="list_id" value="{{ $list->id }}">
					<input type="hidden" name="product_id" id="product_id" value="">

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
<!-- END Delete List Modal -->
