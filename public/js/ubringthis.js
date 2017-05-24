
// $('#modal-delete-list').on('show.bs.modal', function (event) {
// 	var button = $(event.relatedTarget) // Button that triggered the modal
// 	var recipient = button.data('list-id') // Extract info from data-* attributes
// 	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// 	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
// 	var modal = $(this)
// 	modal.find('.modal-body input').val(recipient)
// })

$(document).ready(function() {

		$('.btn-product-delete').click( function() {
			var row = $(this).parents('tr');
			var product_id = row.data('product-id');
			var form = $('#form-product-delete');
			var val = $('#product_id').val(product_id).serialize();
			form.attr('action').replace(':PRODUCT_ID', product_id);
			// var data = form.serialize();
			// $.ajax({
			// 	type: "POST",
			// 	url: url,
			// 	data: data,
			// 	success: function() {
			// 		row.fadeOut();
			// 	}
			// });
		});

		// $('.btn-product-edit').click( function(e) {
		// 	e.preventDefault();
		// 	var row = $(this).parents('td');
		// 	row.toggle();
		// });

});
