<!-- Delete Product Modal -->
<div class="modal fade" id="modal-product-delete" tabindex="-1" role="dialog" aria-labelledby="deleteProduct">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="deleteProduct">Eliminar producte</h4>
			</div>

			<div class="modal-body text-center">
				<h4 class="modal-title">Segur que vols eliminar el producte?</h4>
			</div>

			<div class="modal-footer">
				<form action="/products/:PRODUCT_ID" method="POST" id="form-product-delete">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<input type="hidden" name="list_id" value="{{ $list->id }}">
					<input type="hidden" name="product_id" id="product_id" value="">

					<button type="submit" class="btn btn-danger text-center">
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
<!-- END Delete Product Modal -->
