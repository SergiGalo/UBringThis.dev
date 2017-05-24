@extends('layouts.master')

@section('page_title', 'Productes')

@section('sidebar')

	@include('lists.modal_delete')

	@include('products.modal_delete')

	<div class="list-group-item">
		<?php
			$time = date('h:i', strtotime($list->event_date));
			$date = date('d-m-y', strtotime($list->event_date));
		?>
		<h4><i class="fa fa-info fa-3x" aria-hidden="true"></i></h4>

		<div class="btn-lists">
			<span>
				<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseAddUser" aria-expanded="false" aria-controls="collapseAddUser">
					<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
				</button>
			</span>
			&nbsp;
			<span>
				<a href="/lists/{{ $list->id }}/edit" type="button" class="btn btn-warning">
					<i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
				</a>
			</span>
			&nbsp;
			<span>
				<a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-list-delete" data-list-id="{{ $list->id }}">
					<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
				</a>
			</span>
		</div>

		@include ('add_user')

		<h4 class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}</h4>
		<h4 class="list-group-item"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $time }}</h4>
		<h4 class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $list->location }}</h4>
		<h4 class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Participants:</h4>
		<ul class="list-group-item fa-ul">
			<li>
				<i class="fa fa-user" aria-hidden="true"></i>
				&nbsp; {{ $owner->name.' '.$owner->lastname }}
			</li>
			@foreach($colaboradors as $colaborador)
				<li>
					<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; {{ $colaborador->name.' '.$colaborador->lastname }}
				</li>
			@endforeach
		</ul>
	</div>

@endsection

@section('content')

	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; {{ $list->title }}
	</h2>

	<div class="btn-new-product">
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCreateProduct" aria-expanded="false" aria-controls="collapseCreateProduct">
			Nou producte
		</button>
	</div>

	@include('products.create')

	<div class="table-responsive">
		<table class="table table-striped">
			<tbody>

				@foreach($products as $product)
					<tr data-product-id="{{ $product->id }}">
						<!-- <td>
							@if ($product->confirmed == 0)
								<i class="fa fa-square-o" aria-hidden="true"></i>
							@else
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							@endif
						</td> -->
						<!-- <td>
							<span class="toggle-info">{{ $product->name }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->name }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->quantity }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->quantity }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->units }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->units }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->price }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->price }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->assigned_to }}</span>
							<select class="toggle-input toggle-input" name="colaboradors">
									<option value="null"></option>
									<option value="{{ $list->owner }}">{{ $owner->name }}</option>
								@foreach($colaboradors as $colaborador)
									<option value="{{ $colaborador->id }}">{{ $colaborador->name }}</option>
								@endforeach
							</select>
						</td> -->
						<td>
							<div class="row">
								<div class="p-name col-md-12">
									<h3>{{ $product->name }}</h3>
								</div>
								<div class="p-total col-md-8 text-left">
									<p>{{ $product->quantity.' '.$product->units.' x '.$product->price.'€ = '.($product->quantity*$product->price).'€' }}</p>
								</div>
								<div class="p-assigned col-md-4">
									<p><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;
										@if ($product->assigned_to)
											@if ($product->assigned_to == $owner->owner)
												{{ $owner->name }}
											@else
												@foreach ($colaboradors as $colab)
													@if ($product->assigned_to == $colab->id)
														{{ $colab->name }}
													@endif
												@endforeach
											@endif
										@endif
									</p>
								</div>
							</div>
						</td>

						<td>
							<div class="btn-product">
								<span class="btn-product-edit">
									<a href="/products/{{ $product->id }}/edit" type="button" class="">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a>
								</span>
								<span class="btn-product-delete">
									<a href="" type="button" class="" data-toggle="modal" data-target="#modal-product-delete">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</a>
								</span>
							</div>
						</td>

					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection
